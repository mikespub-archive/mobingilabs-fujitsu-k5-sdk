<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Orchestration\Template;

require 'setAccountTest.php';


$templateClient = new Template(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);

//get a stack's template
echo $templateClient->getStackTemplate('jp-east-1','4becbaa6-4bdd-4a10-b49e-43d7cf322acf','mo-test-autoscale5'); //region, stack_id, stack_name


//validate a volume
$data = array(
    'template'=>file_get_contents('k5_hot.yaml')
);
$data = json_encode($data, JSON_HEX_QUOT);

echo $templateClient->validateTemplate('jp-east-1', $data);
