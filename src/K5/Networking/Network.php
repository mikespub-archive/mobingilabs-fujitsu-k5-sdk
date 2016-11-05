<?php

namespace K5\Networking;

use K5\Token\Auth;

class Network extends Auth
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
    public function getNetworks($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/networks \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
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
    public function getNetworksDetail($region, $network_id){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/networks/'.$network_id.' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }




    /**
     * Create a Network against K5 API
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
    public function createNetwork($region, $data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/networks \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }


}
