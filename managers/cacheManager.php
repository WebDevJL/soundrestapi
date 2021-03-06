<?php
/**
 * CacheManager class
 * 
 * @author Jeremie Litzler
 * @copyright (c) 2014, Jeremie Litzler
 * @link http://jeremielitzler.net/Blog
 * 
 */ 

include_once '../config/constants.php';
include_once __MANAGERSDIR__.'encryptionManager.php';

class CacheManager {
    function __construct() {
        $this->encryption = new EncryptionManager('md5');
    }
    //Path to cache folder (with trailing /)
    var $cache_path = __CACHEPATH__;
    //Length of time to cache a file in seconds
    var $cache_time = 3600;
    

    //This is just a functionality wrapper function
    function get_data($label, $url)
    {
        $label = $this->encryption->Encrypt($label);
        if($data = $this->get_cache($label)){
            return $data;
        } else {
            $data = $this->do_curl($url);
            $this->set_cache($label, $data);
            return $data;
        }
    }

    function set_cache($label, $data)
    {
        $label = $this->encryption->Encrypt($label);
        file_put_contents($this->cache_path . $this->safe_filename($label) .'.cache', $data);
    }

    function get_cache($label)
    {
        if($this->is_cached($label)){
            $filename = $this->cache_path . $this->safe_filename($label) .'.cache';
            return file_get_contents($filename);
        }
        return false;
    }

    function is_cached($label)
    {
        $filename = $this->cache_path . $this->safe_filename($label) .'.cache';

        if(file_exists($filename) && (filemtime($filename) + $this->cache_time >= time())) return true;

        return false;
    }

    //Helper function for retrieving data from url
    function do_curl($url)
    {
        if(function_exists("curl_init")){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
            $content = curl_exec($ch);
            curl_close($ch);
            return $content;
        } else {
            return file_get_contents($url);
        }
    }

    //Helper function to validate filenames
    function safe_filename($filename) 
    {
        return preg_replace('/[^0-9a-z\.\_\-]/i','', strtolower($filename));
    }
}

?>