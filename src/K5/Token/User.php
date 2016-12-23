<?php

namespace K5\Token;


class User
{


    public function getUserProjects($region, $user_id){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://identity.' .$region. '.cloud.global.fujitsu.com/v3/users/'. $user_id. ' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }

}
