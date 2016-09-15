<?php

namespace K5\Networking;


class Network
{

    /**
     * List All Networks against K5 API
     *
     * @see https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/networks
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\getNetworks()
     *
     * @return string
     */
    public static function getNetworks($token, $region){

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/networks \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $token .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * List All Networks against K5 API
     *
     * @see https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/networks
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $network_id           The network id to query
     *
     * @region specific
     *
     * @\K5\Networking\getNetworksDetail()
     *
     * @return string
     */
    public static function getNetworksDetail($token, $region, $network_id){

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/networks/'.$network_id.' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $token .'" \
        ';

        $respond = exec($c);

        return $respond;

    }

}
