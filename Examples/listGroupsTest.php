<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Token\Auth;
use K5\Identity\Group;

require 'setAccountTest.php';


$authInfo = json_decode($tokenClient->getAuthToken());

$response = $authInfo->response;
$response = json_decode($response);


$groupClient = new Group();

//list of all groups
echo $groupClient->getGroups($authInfo->token, $response->token->project->domain->id);
