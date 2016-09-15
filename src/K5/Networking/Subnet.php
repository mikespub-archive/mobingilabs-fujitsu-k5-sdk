<?php

namespace K5\Networking;


class Subnet
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
    public static function getSubnets($token, $region){

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/subnets \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $token .'" \
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
    public static function getSubnetsDetail($token, $region, $subnet_id){

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/subnets/'.$subnet_id.' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $token .'" \
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
    public static function createSubnet($token,$region,$name,$network_id,$cidr,$dns_nameservers,$ip_version,$gateway_ip,$az){

        $data = array(
            'router'=>array(
                'name' => $name,
                'network_id' => $network_id,
                'cidr' => $cidr,
                'dns_nameservers' => $dns_nameservers,
                'ip_version' => $ip_version,
                'gateway_ip' => $gateway_ip,
                'availability_zone' => $az
            )
        );
        $data = json_encode($data, JSON_HEX_QUOT);


        $c = '\
        curl -X POST https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/subnet \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $token .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        echo $respond;

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
    public static function deleteSubnet($token,$region,$subnet_id){


        $c = '\
        curl -X DELETE https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/subnet/'.$subnet_id.' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $token .'" \
        ';

        $respond = exec($c);

        echo $respond;

    }



}
