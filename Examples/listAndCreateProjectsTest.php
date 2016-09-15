<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Token\Auth;
use K5\Identity\Project;

require 'setAccountTest.php';


$authInfo = json_decode($tokenClient->getAuthToken());

$response = $authInfo->response;
$response = json_decode($response);


$projectClient = new Project();

//list of all projects
echo $projectClient->getProjects($authInfo->token, $response->token->project->domain->id);

//create a project
//THIS WILL ACTUALLY CREATE A NEW PROJECT ON YOUR ACCOUNT!
die;
echo $projectClient->createProject(
        $authInfo->token,
        $response->token->project->domain->id,
        'test-Project01',
        'description-Project-01'
    );
