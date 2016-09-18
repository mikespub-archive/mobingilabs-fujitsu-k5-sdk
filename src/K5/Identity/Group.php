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



    /**
     * Create a group against K5 API
     *
     * @see https://identity.cloud.global.fujitsu.com/v3/groups?domain_id={domain_id}
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $domain_id            Customer's domain_id
     * @param $name                 name of the project
     * @param $description          project description
     *
     * @\K5\Identity\createGroup()
     *
     * @return string
     */
    public function createGroup($name, $description){

        $Auth = Auth::getAuthToken();

        $data = array(
            'group'=>array(
                'domain_id' => $Auth['domain_id'],
                'description' => $description,
                'name' => $name
            )
        );
        $data = json_encode($data, JSON_HEX_QUOT);

        $c = '\
        curl -X POST https://identity.gls.cloud.global.fujitsu.com/v3/groups \
        -H "Content-Type: application/json" \
        -H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = shell_exec($c);

        return $respond;

    }



}
