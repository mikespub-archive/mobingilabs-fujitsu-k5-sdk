<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Compute\Snapshot;

require 'setAccountTest.php';


$snapshotClient = new Snapshot(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);

//list of all virtual servers under JP East 1 Region
echo $snapshotClient->getSnapshots('jp-east-1');
