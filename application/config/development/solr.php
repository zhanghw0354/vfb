<?php
$config['servers'] = array(
        array(
            'host' => '10.133.5.55',
            'port' => '8080',
            ),
        array(
            'host' => '10.133.5.56',
            'port' => '8080',
            ),
        array(
            'host' => '10.133.5.57',
            'port' => '8080',
            ),
        );
$config['timeout'] = 5;
$config['retry'] = 3;
$config['news_path'] = 'solr/news';
$config['weibo_path'] = 'solr/weibo';
$config['request_handler'] = 'yqtSelect';
