<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Networking\SecurityGroup;

require 'setAccountTest.php';


$sgClient = new SecurityGroup(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);


//list of all firewalls under JP East 1 Region
echo $sgClient->getSecurityGroups('jp-east-1');

//get sg detail
echo $sgClient->getSecurityGroupsDetail('jp-east-1','2e8dfe2d-2531-498e-8743-e97f5a9a7c11');

//list of security group rules
echo $sgClient->getSecurityGroupRules('jp-east-1');


//create a security group
die();
$data = array(
    'security_group'=>array(
        'name' => 'my test sg'
    )
);
$data = json_encode($data, JSON_HEX_QUOT);
echo $sgClient->createSecurityGroup('jp-east-1', $data);

//delete security group
$sgClient->deleteSecurityGroup('jp-east-1', 'your security group id');
