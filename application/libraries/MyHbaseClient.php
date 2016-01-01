<?php
# Change this to match your thrift root.
$GLOBALS['THRIFT_ROOT'] = dirname(__FILE__).'/Thrift';

require_once( $GLOBALS['THRIFT_ROOT'].'/ClassLoader/ThriftClassLoader.php' );
use Thrift\ClassLoader\ThriftClassLoader;
$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift',dirname(__FILE__));
$loader->register();

# Something is wrong with this. Is this the PHP way of doing things? 
# Old versions of thrift seemingly worked with just a couple includes.
/*
require_once( $GLOBALS['THRIFT_ROOT'].'/Thrift.php' );
require_once( $GLOBALS['THRIFT_ROOT'].'/Type/TMessageType.php' );
require_once( $GLOBALS['THRIFT_ROOT'].'/Type/TType.php' );
require_once( $GLOBALS['THRIFT_ROOT'].'/Exception/TException.php' );
require_once( $GLOBALS['THRIFT_ROOT'].'/Factory/TStringFuncFactory.php' );
require_once( $GLOBALS['THRIFT_ROOT'].'/StringFunc/TStringFunc.php' );
require_once( $GLOBALS['THRIFT_ROOT'].'/StringFunc/Core.php' );
require_once( $GLOBALS['THRIFT_ROOT'].'/Transport/TSocket.php' );
require_once( $GLOBALS['THRIFT_ROOT'].'/Transport/TBufferedTransport.php' );
require_once( $GLOBALS['THRIFT_ROOT'].'/Protocol/TBinaryProtocol.php' );

require_once( $GLOBALS['THRIFT_ROOT'].'/Packages/Hbase/Hbase.php' );
require_once( $GLOBALS['THRIFT_ROOT'].'/Packages/Hbase/Types.php' );
*/

require_once( $GLOBALS['THRIFT_ROOT'].'/Packages/Hbase/Hbase.php' );
require_once( $GLOBALS['THRIFT_ROOT'].'/Packages/Hbase/Types.php' );
use Thrift\Transport\TSocket;
use Thrift\Transport\TBufferedTransport;
use Thrift\Protocol\TBinaryProtocol;
use \Hbase\HbaseClient;

class MyHbaseClient extends HbaseClient {

    private $_transport;

    public function __construct($params) {
        $servers = $params['servers'];
        $sentTimeout = empty($params['send_timeout']) ? 5000 : $params['send_timeout'];//默认5秒
        $recvTimeout = empty($params['recv_timeout']) ? 5000 : $params['recv_timeout'];//默认5秒

        $succ = false;
        $i = -1;
        $retry = 3;
        //取消随机选择thrft server，而是按照优先级选择，如果专门提供给web的server挂了
        //再选择爬虫使用的server
        //shuffle($servers);

        while (!$succ && $retry--) {
            $i = ($i + 1) % count($servers);
            $server = $servers[$i];
            try {
                $socket = new TSocket( $server['host'], $server['port']);
                $socket->setSendTimeout( $sentTimeout );
                $socket->setRecvTimeout( $recvTimeout );
                $this->_transport = new TBufferedTransport( $socket );
                $protocol = new TBinaryProtocol( $this->_transport );
                parent::__construct($protocol);
                $this->_transport->open();
                $succ = true;
            } catch (Exception $e) {
                if ($retry == 1) {
                    $logParams = array(
                            'host' => $server['host'],
                            'port' => $server['port'],
                            'sent_timeout' => $sentTimeout,
                            'recv_timeout' => $recvTimeout,
                            'message' => $e->getMessage(),
                            );
                    $ci =& get_instance();
                    $ci->log->log('error','connect to thrift server failed',$logParams);
                    throw $e;
                }
            }
        }
    }

    public function __destruct() {
        $this->_transport->close();
    }
}
