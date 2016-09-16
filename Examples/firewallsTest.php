<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Networking\Firewall;

require 'setAccountTest.php';


$fwClient = new Firewall(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);


//list of all firewalls under JP East 1 Region
echo $fwClient->getFirewalls('jp-east-1');


//get firewall policies
echo $fwClient->getFirewallPolicies('jp-east-1');


//get firewall rules
echo $fwClient->getFirewallRules('jp-east-1');
