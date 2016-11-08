<?php

namespace K5\Networking;

use K5\Token\Auth;

class Subnet extends Auth
{

    /**
     * List All Subnets against K5 API
     *
     * @see https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/subnets
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
    public function getSubnets($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/subnets \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Get subnet details against K5 API
     *
     * @see https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/subnets/{subnet_id}
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $subnet_id            The subnet id to query
     *
     * @region specific
     *
     * @\K5\Networking\getRouterDetail()
     *
     * @return string
     */
    public function getSubnetsDetail($region, $subnet_id){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/subnets/'.$subnet_id.' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Create a subnet
     *
     * @see https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/subnets
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $az                   Availability Zone
     * @param $name                 Router's name
     * @param $network_id           The network id to be attached to
     * @param $cidr                 CIDR (eg. 127.0.0.1/255)
     * @param $dns_nameservers      DNS
     * @param $ip_version           ipv4,ipv6
     * @param $gateway_ip           Specify gateway ip
     *
     * @region specific
     *
     * @\K5\Networking\createRouter()
     *
     * @return string
     */
    public function createSubnet($region, $data){

        $Auth = Auth::getAuthToken();


        $c = '\
        curl -X POST https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/subnets \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Delete subnet
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/routers
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $router_id            Router id to be deleted
     *
     * @region specific
     *
     * @\K5\Networking\createRouter()
     *
     * @return string
     *
     */
    public function deleteSubnet($region,$subnet_id){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X DELETE https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/subnets/'.$subnet_id.' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



}
