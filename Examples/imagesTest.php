<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Image\Image;

require 'setAccountTest.php';


$imageClient = new Image(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);

//list of all images under JP East 1 Region
echo $imageClient->getImages('jp-east-1');
