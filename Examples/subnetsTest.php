<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Networking\Subnet;

require 'setAccountTest.php';


$subnetClient = new Subnet(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);


//list of all subnets under JP East 1 Region
echo $subnetClient->getSubnets('jp-east-1');

//Get details of a specific network
//Replace '95994154-eabe-499a-af18-555eadfe8862' with your own network id
echo $subnetClient->getSubnetsDetail('jp-east-1', '95994154-eabe-499a-af18-555eadfe8862');


//create a subnet
//see src/K5/Networking/Subnet.php
die();
$subnetClient->createSubnet();
