<?php

namespace K5\Networking;

use K5\Token\Auth;

class FloatingIP extends Auth
{

    /**
     * List All Floating IPs against K5 API
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/floatingips
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\FloatingIP\getFloatingIPs()
     *
     * @return string
     */
    public function getFloatingIPs($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/floatingips \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Get Floating IP detail
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/floatingips/{ip_id}
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\FloatingIP\getFloatingIPsDetail()
     *
     * @return string
     */
    public function getFloatingIPsDetail($region, $ip){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/floatingips/'. $ip. ' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Release a Floating IP
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/floatingips/{ip_id}
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\FloatingIP\getFloatingIPsDetail()
     *
     * @return string
     */
    public function releaseFloatingIp($region, $ip){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X DELETE https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/floatingips/'. $ip. ' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Allocate a Floating IP to a port
     * allocate a global IP address for accessing virtual resources over the internet and assign it to a virtual server
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/floatingips
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\FloatingIP\getFloatingIPs()
     *
     * @return string
     */
    public function allocateFloatingIP($region, $data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/floatingips \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }




}
