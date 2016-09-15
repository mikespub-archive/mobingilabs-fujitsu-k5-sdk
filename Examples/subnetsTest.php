<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Token\Auth;
use K5\Networking\Subnet;

require 'setAccountTest.php';


$authInfo = json_decode($tokenClient->getAuthToken());

$response = $authInfo->response;
$response = json_decode($response);


$subnetClient = new Subnet();


//list of all subnets under JP East 1 Region
// echo $subnetClient->getSubnets($authInfo->token, 'jp-east-1');

//Get details of a specific network
//Replace '95994154-eabe-499a-af18-555eadfe8862' with your own network id
echo $subnetClient->getSubnetsDetail($authInfo->token, 'jp-east-1', '95994154-eabe-499a-af18-555eadfe8862');


//create a subnet
//see src/K5/Networking/Subnet.php
die();
$subnetClient->createSubnet();
