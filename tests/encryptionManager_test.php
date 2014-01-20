<?php
include_once('../config/constants.php');
include_once(__MANAGERSDIR__ . 'encryptionManager.php');

$word = "s_1";
$encrypt = new EncryptionManager('md5');
$result = $encrypt->Encrypt($word);
echo '<br/>md5:'.$result;

$encrypt->encryptionType ='sha1';
$result2 = $encrypt->Encrypt($word);
echo '<br/>sha1:'.$result2;
?>
