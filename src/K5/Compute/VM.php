<?php

namespace K5\Compute;


class VM
{

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
    public static function getVirtualServers($token, $region, $project_id){

        $c = '\
        curl -X GET https://compute.' .$region. '.cloud.global.fujitsu.com/v2/' .$project_id. '/servers \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $token .'" \
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
    public static function getServerInfo($token, $region, $project_id, $server_id){

        $c = '\
        curl -X GET https://compute.' .$region. '.cloud.global.fujitsu.com/v2/' .$project_id. '/servers/' .$server_id. ' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $token .'" \
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
    public static function createServers($token,$region,$data){

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
        curl -X POST https://compute.' .$region. '.cloud.global.fujitsu.com/v2/' .$project_id. '/servers \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $token .'" \
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
    public static function deleteServer($token,$region,$server_id){

        $c = '\
        curl -X DELETE https://compute.' .$region. '.cloud.global.fujitsu.com/v2/' .$project_id. '/servers/' .$server_id. ' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $token .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



}
