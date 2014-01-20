<?php
/**
 * ConfigManager class
 * 
 * @author Jeremie Litzler
 * @copyright (c) 2014, Jeremie Litzler
 * @link http://jeremielitzler.net/Blog
 * 
 */ 

include_once '../config/constants.php';
include_once __MANAGERSDIR__.'cacheManager.php';

class ConfigManager {
    /**
     * Constructor
     */
    function __construct() {
        $this->cache = new CacheManager();
    }
    
    public function Load() {
        //Get the file path of all xml config files
        $configDir = __CONFIGDIR__.'xml';
        $xmlFilePaths = array_diff(scandir($configDir), array('..', '.'));
        //var_dump($xmlFilePaths);
        foreach ($xmlFilePaths as $filePath) {
            $this->cache->set_cache($filePath, $this->LoadFile($configDir.'/'.$filePath));
        }
    }
    private function LoadFile($filePath) {
        if (file_exists($filePath)) {
            //echo $filePath.'<br/>';
            $xml = simplexml_load_file($filePath);
            return json_encode($xml);
        } else {
            exit('Failed to open '.$filePath);
        }    
    }
}

