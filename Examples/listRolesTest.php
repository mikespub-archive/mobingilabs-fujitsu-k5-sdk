<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Token\Auth;
use K5\Identity\Role;

require 'setAccountTest.php';


$authInfo = json_decode($tokenClient->getAuthToken());

$response = $authInfo->response;
$response = json_decode($response);


$roleClient = new Role();

//list of all groups
echo $roleClient->getRoles($authInfo->token, $response->token->project->domain->id);
