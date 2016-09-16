<?php

namespace K5\Image;

use K5\Token\Auth;

class Image extends Auth
{

    /**
     * Get Images(a.k.a OS) list against K5 API
     *
     * @see https://compute.jp-east-1.cloud.global.fujitsu.com/v2/PROJECT_ID/images/detail
     *
     * @param $region               Specify region
     *
     * @\K5\Compute\getImages()
     *
     * @return string
     */
    public function getImages($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://compute.' .$region. '.cloud.global.fujitsu.com/v2/' .$Auth['project_id']. '/images/detail \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }




}
