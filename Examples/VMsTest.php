<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Token\Auth;
use K5\Compute\VM;

require 'setAccountTest.php';


$authInfo = json_decode($tokenClient->getAuthToken());

$response = $authInfo->response;
$response = json_decode($response);


$vmClient = new VM();

//list of all virtual servers under JP East 1 Region
echo $vmClient->getVirtualServers($authInfo->token, 'jp-east-1', $response->token->project->id);

//get server details
echo $vmClient->getServerInfo($authInfo->token, 'jp-east-1', $response->token->project->id,'3e7f437e-1cd1-413a-bc7d-4d7bade93394');


//delete a server
die();
$vmClient->deleteServer($authInfo->token, 'jp-east-1', $response->token->project->id,'your-server-id');

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
$vmClient->createServers($authInfo->token, 'jp-east-1', $response->token->project->id,$data);
