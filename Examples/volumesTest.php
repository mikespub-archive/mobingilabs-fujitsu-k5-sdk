<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\BlockStorage\Volume;

require 'setAccountTest.php';


$volumeClient = new Volume(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);

//list of all volumes under JP East 1 Region
echo $volumeClient->getVolumes('jp-east-1');

//create a volume

$data = array(
    'volumes'=>array(
        'name' => '', //name of volume
        "availability_zone" => '', //az
        "source_volid" => '', //volume id if this is to be referenced
        "description" => '', //description
        "snapshot_id" => '', //snapshot_id
        "size" => '', //size of volume in GB
        "imageRef" => '', //image_id
        "volume_type" => '' //type
    )
);
$data = json_encode($data, JSON_HEX_QUOT);

die();
echo $volumeClient->createVolumes('jp-east-1', $data);
