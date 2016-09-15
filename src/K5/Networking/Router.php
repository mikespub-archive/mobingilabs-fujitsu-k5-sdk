<?php

namespace K5\Networking;


class Router
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
    public static function getRouters($token, $region){

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/routers \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $token .'" \
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
    public static function getRouterDetail($token, $region, $router_id){

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/routers/'.$router_id.' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $token .'" \
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
    public static function createRouter($token,$region,$az,$name){

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
    	-H "X-Auth-Token: '. $token .'" \
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
    public static function deleteRouter($token,$region,$router_id){


        $c = '\
        curl -X DELETE https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/routers/'.$router_id.' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $token .'" \
        ';

        $respond = exec($c);

        echo $respond;

    }



}
