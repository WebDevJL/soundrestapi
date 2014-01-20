<?php
$oc = '<!--';
$cc = '-->';
/**
 * Root of the application path
 */    
define('__ROOT__', dirname(dirname(__FILE__)));
echo $oc.__ROOT__.$cc;
//echo '<br/>';

/**
 * Managers folder path
 */
define('__MANAGERSDIR__', __ROOT__.'/managers/');
echo $oc.__MANAGERSDIR__.$cc;
//echo '<br/>';

/**
 * Tests folder path
 */
define('__TESTSDIR__', __ROOT__.'/tests/');
echo $oc.__TESTSDIR__.$cc;
//echo '<br/>';

/**
 * Config folder path
 */
define('__CONFIGDIR__', __ROOT__.'/config/');
echo $oc.__CONFIGDIR__.$cc;
//echo '<br/>';

/**
 * 
 */

/**
 * Cached ressources path
 */
define('__CACHEPATH__', __ROOT__.'/ressources/cache/');