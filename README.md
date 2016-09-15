# k5-php-sdk
A PHP SDK Library for Fujitsu K5 Cloud http://www.fujitsu.com/global/solutions/cloud/k5/


__This project is still under development.__


#### Installation

`composer require mobingilabs/k5-php-client`

#### Sample usage:

```php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Token\Auth;
use K5\Identity\Role;
use K5\Networking\Router;
use K5\Compute\VM;


require 'setAccountTest.php'; //Need to setup your K5 username, password & contract number


$authInfo = json_decode($tokenClient->getAuthToken());

$response = $authInfo->response;
$response = json_decode($response);


$roleClient = new Role();

//list of all groups
echo $roleClient->getRoles($authInfo->token, $response->token->project->domain->id);


//list of all networks under JP East 1 Region
echo $routerClient->getRouters($authInfo->token, 'jp-east-1');


$vmClient = new VM();

//list of all virtual servers under JP East 1 Region
echo $vmClient->getVirtualServers($authInfo->token, 'jp-east-1', $response->token->project->id);

```


See `/Examples` folder for more sample codes.
