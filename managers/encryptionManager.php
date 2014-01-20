<?php
/**
 * Encryption class
 * 
 * @author Jeremie Litzler
 * @copyright (c) 2014, Jeremie Litzler
 * @link http://jeremielitzler.net/Blog
 * 
 */ 
class EncryptionManager {
    /**
     * Constructor
     * 
     * @param type $encryptionType
     */
    function __construct($encryptionType) {
        $this->encryptionType = ($encryptionType === null) ? "md5" : $encryptionType;
    }
    /**
     * 
     * @param string $stringToEncrypt
     * @return string encrypted
     */
    public function Encrypt($stringToEncrypt) {
        switch ($this->encryptionType) {
            case "md5":
                return md5($stringToEncrypt);
                break;
            case "sha1":
                return sha1($stringToEncrypt);
                break;
            case "mcrypt":
                //TODO: copy logic from CodeIgniter encrypt class
                break;
            default:
                break;
        } 
    }
    /**
     *
     * @var string 
     */
    public $encryptionType = "md5";
}
