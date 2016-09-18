<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Identity\Group;

require 'setAccountTest.php';

$groupClient = new Group(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);

//list of all groups
echo $groupClient->getGroups();


//create a group
//THIS WILL ACTUALLY CREATE A NEW GROUP ON YOUR ACCOUNT
die();
echo $groupClient->createGroup(
        'test-Group01', //project name
        'description-Group-01' //project description
    );
