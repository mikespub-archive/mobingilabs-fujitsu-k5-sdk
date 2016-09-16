<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Orchestration\Stack;

require 'setAccountTest.php';


$stackClient = new Stack(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);


//List stacks
echo $stackClient->listStacks('jp-east-1');


//Get stack details
echo $stackClient->getStackDetails('jp-east-1','446031dc-ce7b-4480-956a-8ade0a53b8d1','k5-php-sdk-testStack'); //region, stack id, stack name


//Get stack events
echo $stackClient->getStackEvents('jp-east-1','446031dc-ce7b-4480-956a-8ade0a53b8d1','k5-php-sdk-testStack'); //region, stack id, stack name


//Get stack resources
echo $stackClient->getStackResources('jp-east-1','4becbaa6-4bdd-4a10-b49e-43d7cf322acf','mo-test-autoscale5'); //region, stack id, stack name


//Test delete a Stack
die();
echo $stackClient->deleteStack('jp-east-1','446031dc-ce7b-4480-956a-8ade0a53b8d1','k5-php-sdk-testStack'); //region, stack id, stack name


/*
* Test Creating a template from YAML template firewall_rules
* remove die() to test creating the stack
*/
die();
$template = file_get_contents('k5_hot.yaml');
$contents = addcslashes(rtrim($template), '"\\'); //parse double quotes
$contents_array = preg_split("/\\r\\n|\\r|\\n/", $contents); //add \n to line breaks
$template_body = '';
foreach ($contents_array as $key => $value) {
    $template_body .= $value.'\n';
}
$template_body = trim(rtrim($template_body)); //remove white spaces
$params = ''; //As we set default params in the template, so we can pass empty here
$data = '{
    "stack_name": "k5-php-sdk-testStack",
    "template": "'.$template_body.'",
    "parameters": "'.$params.'"
}'; //already in Json format, don't need to do json_encode again here

echo $stackClient->createStack('jp-east-1', $data);
/*
* finished creating a new Stack
*/
