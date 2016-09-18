<?php


require_once __DIR__ . '/../vendor/autoload.php';

use K5\Token\Auth;

//You can setup your credentials into environment variables, or directly replace these settings for test
define("K5_USERNAME", getenv('K5_USERNAME'));
define("K5_PASSWORD", getenv('K5_PASSWORD'));
define("K5_CONTRACT", getenv('K5_CONTRACT'));
