<?php
class RedisClient extends Redis {

    public function __construct($params = array()) {
        parent::__construct();
        $this->ci =& get_instance();
        $configFile = 'redis';
        $this->ci->config->load($configFile,true);
        $servers = $this->ci->config->item('servers',$configFile);
        $timeout = $this->ci->config->item('timeout',$configFile);
        $dbName = isset($params['db_name']) ? $params['db_name'] : 'web_db';
        $database = $this->ci->config->item($dbName,$configFile);

        $succ = false;
        $i = -1;
        $retry = 3;
        shuffle($servers);

        while (!$succ && $retry--) {
            $i = ($i + 1) % count($servers);
            $server = $servers[$i];
            try {
                $succ = $this->connect($server['host'],$server['port'],$timeout);
                $succ = $this->select($database);
            } catch (Exception $e) {
                if ($retry == 1) {
                    $logParams = array(
                            'host' => $server['host'],
                            'port' => $server['port'],
                            'timeout' => $timeout,
                            'message' => $e->getMessage(),
                            );
                    $this->ci->log->log('error','connect to redis failed',$logParams);
                    throw $e;
                }
            }
        }
    }
}
