<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Token\Auth;
use K5\Networking\Network;

require 'setAccountTest.php';


$authInfo = json_decode($tokenClient->getAuthToken());

$response = $authInfo->response;
$response = json_decode($response);


$networkClient = new Network();

//list of all networks under JP East 1 Region
echo $networkClient->getNetworks($authInfo->token, 'jp-east-1');

//Get details of a specific network
//Replace '53bdc6d8-fff8-46e2-b88e-bd9adb633609' with your own network id
echo $networkClient->getNetworksDetail($authInfo->token, 'jp-east-1', '53bdc6d8-fff8-46e2-b88e-bd9adb633609');
