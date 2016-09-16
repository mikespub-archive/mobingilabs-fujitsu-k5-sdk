<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Networking\Router;

require 'setAccountTest.php';


$routerClient = new Router(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);


//list of all networks under JP East 1 Region
echo $routerClient->getRouters('jp-east-1');

//Get details of a specific network
//Replace '53bdc6d8-fff8-46e2-b88e-bd9adb633609' with your own network id
echo $routerClient->getRouterDetail('jp-east-1', '699781f2-995f-48dc-bcba-ab78fc8bf420');


//create a router
die();
$routerClient->createRouter(
    'jp-east-1',
    'jp-east-1a',
    'My-test-router01'
);


//delete a router
die();
$routerClient->deleteRouter('jp-east-1', 'af8de4d8-b2d8-4018-9ddb-35110624e65c');
