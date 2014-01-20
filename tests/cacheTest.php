<?php
    require_once '../config/constants.php';
    require_once __MANAGERSDIR__.'CacheManager.php';
    
    $cache = new CacheManager();
    
    //if item is cached, get it
    if($data = $cache->get_cache('test')){
        $data = json_decode($data);
    } else {
        $data = $cache->do_curl('http://ip.jsontest.com/');
        $cache->set_cache('label', $data);
        $data = json_decode($data);
    }
    
    echo var_dump($data);