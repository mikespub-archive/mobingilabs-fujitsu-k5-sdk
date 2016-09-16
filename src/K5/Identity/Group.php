<?php

namespace K5\Identity;

use K5\Token\Auth;

class Group extends Auth
{

    /**
     * List All Groups against K5 API
     *
     * @see https://identity.cloud.global.fujitsu.com/v3/groups?domain_id={domain_id}
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $domain_id            Customer's domain_id
     *
     * @\K5\Identity\getGroups()
     *
     * @return string
     */
    public function getGroups(){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://identity.cloud.global.fujitsu.com/v3/groups?domain_id='. $Auth['domain_id'] .' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = shell_exec($c);

        return $respond;

    }



}
