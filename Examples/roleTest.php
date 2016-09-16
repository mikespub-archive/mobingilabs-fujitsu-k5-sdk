<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Identity\Role;

require 'setAccountTest.php';

$roleClient = new Role(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);

//list of all groups
echo $roleClient->getRoles();
