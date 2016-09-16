<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Compute\Keypair;
use K5\Compute\VirtualServer;

require 'setAccountTest.php';


$keypairClient = new Keypair(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);

//get all OS keypairs
echo $keypairClient->getKeypairs('jp-east-1');


$vmClient = new VirtualServer(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);

//list of all virtual servers under JP East 1 Region
echo $vmClient->getVirtualServers('jp-east-1');

//get server details
echo $vmClient->getServerInfo('jp-east-1', '3e7f437e-1cd1-413a-bc7d-4d7bade93394');


//delete a server
die();
$vmClient->deleteServer('jp-east-1', '3e7f437e-1cd1-413a-bc7d-4d7bade93394');

//creates a server
$data = array(
    'server'=>array(
        'name' => 'my-test-server-001', //name
        'imageRef' => '', //Image ID
        'flavorRef' => '', //Eg. 'S-1'
        'key_name' => '', //key pair name
        'max_count' => '', // maximum servers
        'min_count' => '', // minumum servers
        'networks' => array (
            array (
                'uuid' => '', //network id
                'port' => '' //port (a.k.a "interface") id
            )
        ),
        'security_groups' => array (
            array (
                'name' => '' //security group name
            )
        ),
        'block_device_mapping_v2' => array (
            array (
                'device_name' => '', //device name
                'destination_type' => '', //eg. volume
                'source_type' => '', //volume, image or snapshot
                'uuid' => '', //corresponding id, in this case 'volume_id'
                'volume_size' => '', //in GB
                'boot_index' => "0",
                'delete_on_termination' => '' //true or false
            )
        )
    )
);
$data = json_encode($data, JSON_HEX_QUOT);
die();
$vmClient->createServers('jp-east-1', $data);
