<?php

namespace K5\Compute;

use K5\Token\Auth;

class Snapshot extends Auth
{

    /**
     * List All OS Snapshots against K5 API
     *
     * @see https://compute.jp-east-1.cloud.global.fujitsu.com/v1.1/PROJECT_ID/os-snapshots/detail
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Compute\Snapshot\getSnapshots()
     *
     * @return string
     */
    public function getSnapshots($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://compute.' .$region. '.cloud.global.fujitsu.com/v1.1/' .$Auth['project_id']. '/os-snapshots/detail \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



}
