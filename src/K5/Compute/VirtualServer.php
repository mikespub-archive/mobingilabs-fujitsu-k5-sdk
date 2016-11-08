<?php

namespace K5\Compute;

use K5\Token\Auth;

class VirtualServer extends Auth
{


    /**
     * Get Available Server Flavors
     *
     * @see https://compute.jp-east-1.cloud.global.fujitsu.com/v2/PROJECT_ID/servers
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Compute\getVirtualServers()
     *
     * @return string
     */
    public function getServerFlavors($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://compute.' .$region. '.cloud.global.fujitsu.com/v2/' .$Auth['project_id']. '/flavors/detail \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }

    /**
     * List All Virtual Machines against K5 API
     *
     * @see https://compute.jp-east-1.cloud.global.fujitsu.com/v2/PROJECT_ID/servers
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Compute\getVirtualServers()
     *
     * @return string
     */
    public function getVirtualServers($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://compute.' .$region. '.cloud.global.fujitsu.com/v2/' .$Auth['project_id']. '/servers \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Get VM details
     *
     * @see https://compute.jp-east-1.cloud.global.fujitsu.com/v2/{PROJECT_ID}/servers/{SERVER_ID}
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $server_id            The server id to query
     *
     * @region specific
     *
     * @\K5\Networking\getServerInfo()
     *
     * @return string
     */
    public function getServerInfo($region, $server_id){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://compute.' .$region. '.cloud.global.fujitsu.com/v2/' .$Auth['project_id']. '/servers/' .$server_id. ' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }






    /**
     * Update a VM
     *
     * @see https://compute.jp-east-1.cloud.global.fujitsu.com/v2/{PROJECT_ID}/servers/{SERVER_ID}
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $server_id            The server id to query
     *
     * @region specific
     *
     * @\K5\Networking\getServerInfo()
     *
     * @return string
     */
    public function updateServer($region, $server_id, $data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X PUT https://compute.' .$region. '.cloud.global.fujitsu.com/v2/' .$Auth['project_id']. '/servers/' .$server_id. ' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Retrieve server port ID, which is required for assigning global IP addresses to the virtual server
     *
     * @see https://compute.jp-east-1.cloud.global.fujitsu.com/v2/{PROJECT_ID}/servers/{SERVER_ID}
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $server_id            The server id to query
     *
     * @region specific
     *
     * @\K5\Networking\getServerInfo()
     *
     * @return string
     */
    public function getServerPort($region, $server_id){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://compute.' .$region. '.cloud.global.fujitsu.com/v2/' .$Auth['project_id']. '/servers/' .$server_id. '/os-interface \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Create Virtual Machines
     *
     * https://compute.jp-east-1.cloud.global.fujitsu.com/v2/{PROJECT_ID}/servers/{SERVER_ID}
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $data                 See below
     *
     * @region specific
     *
     * @\K5\Networking\createServers()
     *
     * @return string
     */
    public function createServers($region,$data){

        $Auth = Auth::getAuthToken();

        // $data in json format corresponding to the following array:
        //
        // $data = array(
        //     'server'=>array(
        //         'name' => 'my-test-server-001', //name
        //         'imageRef' => '', //Image ID
        //         'flavorRef' => '', //Eg. 'S-1'
        //         'key_name' => '', //key pair name
        //         'max_count' => '', // maximum servers
        //         'min_count' => '', // minumum servers
        //         'networks' => array (
        //             array (
        //                 'uuid' => '', //network id
        //                 'port' => '' //port (a.k.a "interface") id
        //             )
        //         ),
        //         'security_groups' => array (
        //             array (
        //                 'name' => '' //security group name
        //             )
        //         ),
        //         'block_device_mapping_v2' => array (
        //             array (
        //                 'device_name' => '', //device name
        //                 'destination_type' => '', //eg. volume
        //                 'source_type' => '', //volume, image or snapshot
        //                 'uuid' => '', //corresponding id, in this case 'volume_id'
        //                 'volume_size' => '', //in GB
        //                 'boot_index' => "0",
        //                 'delete_on_termination' => '' //true or false
        //             )
        //         )
        //     )
        // );
        // $data = json_encode($data, JSON_HEX_QUOT);

        $c = '\
        curl -X POST https://compute.' .$region. '.cloud.global.fujitsu.com/v2/' .$Auth['project_id']. '/servers \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Delete Virtual Machine
     * https://compute.jp-east-1.cloud.global.fujitsu.com/v2/{PROJECT_ID}/servers/{SERVER_ID}
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $server_id            Server id to be deleted
     *
     * @region specific
     *
     * @\K5\Networking\deleteServer()
     *
     * @return string
     *
     */
    public function deleteServer($region, $server_id){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X DELETE https://compute.' .$region. '.cloud.global.fujitsu.com/v2/' .$Auth['project_id']. '/servers/' .$server_id. ' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



}
