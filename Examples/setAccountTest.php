<?php


require_once __DIR__ . '/../vendor/autoload.php';

use K5\Token\Auth;


const K5_USERNAME = 'K5_USERNAME';
const K5_PASSWORD = 'K5_PASSWORD';
const K5_CONTRACT = 'K5_CONTRACT';


$tokenClient = new Auth(
    getenv(K5_USERNAME),
    getenv(K5_PASSWORD),
    getenv(K5_CONTRACT)
    ,false
);
