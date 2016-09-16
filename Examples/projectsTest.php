<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Identity\Project;

require 'setAccountTest.php';

$projectClient = new Project(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);



//list of all projects
echo $projectClient->getProjects();

//create a project
//THIS WILL ACTUALLY CREATE A NEW PROJECT ON YOUR ACCOUNT!
die;
echo $projectClient->createProject(
        'test-Project01', //project name
        'description-Project-01' //project description
    );
