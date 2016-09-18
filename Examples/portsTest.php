<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Networking\Port;

require 'setAccountTest.php';

$portClient = new Port(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);

//list of all groups
echo $portClient->getPorts('jp-east-1');


//create a port (a.k.a network interface)
$data = array(
    'port'=>array(
        'name' => 'my-test-port',
        'network_id' => '', //network to be linked
        'fixed_ips' => array (
            array(
                'subnet_id' => '', //subnet to be linked
                'ip_address' => '' //ip to be assigned
            )
        ),
        'availability_zone' => '' //jp-east-1a, etc.
    )
);
$data = json_encode($data, JSON_HEX_QUOT);
die();
$portClient->createPort('jp-east-1',$data);
