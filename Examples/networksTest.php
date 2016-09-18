<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Networking\Network;

require 'setAccountTest.php';


$networkClient = new Network(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);


//list of all networks under JP East 1 Region
echo $networkClient->getNetworks('jp-east-1');

//Get details of a specific network
//Replace '53bdc6d8-fff8-46e2-b88e-bd9adb633609' with your own network id
echo $networkClient->getNetworksDetail('jp-east-1', '53bdc6d8-fff8-46e2-b88e-bd9adb633609');
