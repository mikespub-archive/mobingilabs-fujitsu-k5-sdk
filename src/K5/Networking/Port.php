<?php

namespace K5\Networking;

use K5\Token\Auth;

class Port extends Auth
{

    /**
     * List All Ports (A.K.A network interfaces) against K5 API
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/ports
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\Port\getPorts()
     *
     * @return string
     */
    public function getPorts($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/ports \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Create a port (network interface)
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/ports
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $data
     *
     * @region specific
     *
     * @\K5\Networking\Port\createPort()
     *
     * @return string
     */
    public function createPort($region, $data){

        $Auth = Auth::getAuthToken();

        //sample $data structure
        // $data = array(
        //     'port'=>array(
        //         'name' => '',
        //         'network_id' => '',
        //         'fixed_ips' => array (
        //             array(
        //                 'subnet_id' => '',
        //                 'ip_address' => ''
        //             )
        //         ),
        //         'availability_zone' => ''
        //     )
        // );
        // $data = json_encode($data, JSON_HEX_QUOT);

        $c = '\
        curl -X POST https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/ports \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Delete a port (network interface)
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/ports
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $data
     *
     * @region specific
     *
     * @\K5\Networking\Port\createPort()
     *
     * @return string
     */
    public function deletePort($region, $port_id){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X DELETE https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/ports/'.$port_id.' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * List Ports (network interfaces)
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/ports
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\Port\listPorts()
     *
     * @return string
     */
    public function lsitPorts($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/ports \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Show Port (network interfaces)
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/ports
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\Port\showPort()
     *
     * @return string
     */
    public function showPort($region, $port_id){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/ports/'.$port_id.' \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }


}
