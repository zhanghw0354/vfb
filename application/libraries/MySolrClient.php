<?php

class MySolrClient extends SolrClient {

    public function __construct($params) {
        $succ = false;
        $i = -1;
        $servers = $params['servers'];
        $path = $params['path'];
        $retry = $params['retry'];
        $timeout = $params['timeout'];
        shuffle($servers);

        while (!$succ && $retry--) {
            $i = ($i + 1) % count($servers);
            $server = $servers[$i];
            $options = array(
                    'hostname' => $server['host'],
                    'port' => $server['port'],
                    'path' => $path,
                    'timeout' => $timeout,
                    );
            try {
                parent::__construct($options);
                $this->ping();
                $succ = true;
            } catch (Exception $e) {
                if ($retry == 1) {
                    $ci =& get_instance();
                    $ci->log->log('warning','connect to solr failed',$options);
                    throw $e;
                }
            }
        }
    }
}
