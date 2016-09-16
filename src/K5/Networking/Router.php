<?php

namespace K5\Networking;

use K5\Token\Auth;

class Router extends Auth
{

    /**
     * List All Routers against K5 API
     *
     * @see https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/routers
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\getRouters()
     *
     * @return string
     */
    public function getRouters($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/routers \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * List All Networks against K5 API
     *
     * @see https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/routers/{router_id}
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $router_id            The router id to query
     *
     * @region specific
     *
     * @\K5\Networking\getRouterDetail()
     *
     * @return string
     */
    public function getRouterDetail($region, $router_id){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/routers/'.$router_id.' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Create a router
     *
     * @see https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/routers
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $az                   Availability Zone
     * @param $name                 Router's name
     *
     * @region specific
     *
     * @\K5\Networking\createRouter()
     *
     * @return string
     */
    public function createRouter($region,$az,$name){

        $Auth = Auth::getAuthToken();

        $data = array(
            'router'=>array(
                'availability_zone' => $az,
                'name' => $name
            )
        );
        $data = json_encode($data, JSON_HEX_QUOT);


        $c = '\
        curl -X POST https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/routers \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        echo $respond;

    }



    /**
     * Delete routers
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/routers
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $router_id            Router id to be deleted
     *
     * @region specific
     *
     * @\K5\Networking\deleteRouter()
     *
     * @return string
     *
     */
    public function deleteRouter($region,$router_id){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X DELETE https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/routers/'.$router_id.' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        echo $respond;

    }



}
