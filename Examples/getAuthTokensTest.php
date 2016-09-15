<?php

require_once __DIR__ . '/../vendor/autoload.php';

use K5\Token\Auth;

require 'setAccountTest.php';

/**
 * Test to get an auth token.
 * NOTE: You need to go to K5 portal to enable each region for your account before your token can work
 *
 * @see _documentation url_
 *
 * @param $k5_username          Customer's Username
 * @param $k5_password          Customer's Password
 * @param $k5_contract_number   Customer's Contract Number
 * @param $global               If sets TRUE, will get global token
 *
 * @\K5\Token\Auth()
 *
 * @return string
 */
$authInfo = json_decode($tokenClient->getAuthToken());



//get the token string
echo $token = $authInfo->token;


//get full response, contains manay datas including your domain_id, etc.
$response = $authInfo->response;
$response = json_decode($response);

//get project_id
$project_id = $response->token->project->id;

//get project name
$project_name = $response->token->project->name;

//get domain id
$domain_id = $response->token->project->domain->id;

// echo "<pre>";
// print_r($response);
