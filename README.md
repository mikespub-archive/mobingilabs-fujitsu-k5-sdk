# k5-php-sdk
A PHP SDK Library for Fujitsu K5 Cloud http://jp.fujitsu.com/solutions/cloud/k5/index.html


__This project is still under development.__


#### Installation

`composer require mobingilabs/fujitsu-k5-sdk:dev-development`

For stable releases please check [releases](https://github.com/mobingilabs/fujitsu-k5-sdk/releases) section.

#### Sample usage:

```php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Networking\Network;

require 'setAccountTest.php'; //setup your K5 credentials here

$networkClient = new Network(K5_USERNAME,K5_PASSWORD,K5_CONTRACT,false);


//list of all networks under JP East 1 Region
echo $networkClient->getNetworks('jp-east-1');

//Get details of a specific network
//Replace '53bdc6d8-fff8-46e2-b88e-bd9adb633609' with your own network id
echo $networkClient->getNetworksDetail('jp-east-1', '53bdc6d8-fff8-46e2-b88e-bd9adb633609');


```


See `/Examples` folder for more sample codes.
