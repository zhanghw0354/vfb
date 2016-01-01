<?php
$config['servers'] = array(
        array(
            'host' => '10.254.4.6',
            'port' => '8080',
            ),
        array(
            'host' => '10.254.4.9',
            'port' => '8080',
            ),
        array(
            'host' => '10.254.4.18',
            'port' => '8080',
            ),
        );
$config['timeout'] = 5;
$config['retry'] = 3;
$config['news_path'] = 'solr/news';
$config['weibo_path'] = 'solr/weibo';
$config['request_handler'] = 'yqtSelect';
