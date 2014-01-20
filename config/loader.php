<?php
    require_once 'constants.php';
    require_once __MANAGERSDIR__.'ConfigManager.php';

    $config = new ConfigManager();
    $config->Load();