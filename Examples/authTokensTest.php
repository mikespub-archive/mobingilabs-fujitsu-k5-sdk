<?php

require_once __DIR__ . '/../vendor/autoload.php';

require 'setAccountTest.php';


$tokenClient = new Auth(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false); //set last parameter to TRUE for a global token instead

//get the authentication token information
$authInfo = $tokenClient->getAuthToken();

//token used for making each API call
echo $authInfo['token'];

// your project(tenant) id
echo $authInfo['project_id'];

// your domain id
echo $authInfo['domain_id'];
