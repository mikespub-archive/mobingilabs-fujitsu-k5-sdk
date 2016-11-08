<?php

namespace K5\Compute;

use K5\Token\Auth;

class Keypair extends Auth
{

    /**
     * List All keypairs against K5 API
     *
     * https://compute.jp-east-1.cloud.global.fujitsu.com/v2.0/PROJECT_ID/os-keypairs
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Compute\Keypair\getKeypairs()
     *
     * @return string
     */
    public function getKeypairs($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://compute.' .$region. '.cloud.global.fujitsu.com/v2/' .$Auth['project_id']. '/os-keypairs \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Upload a keypair against K5 API
     *
     * https://compute.jp-east-1.cloud.global.fujitsu.com/v2.0/PROJECT_ID/os-keypairs
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Compute\Keypair\getKeypairs()
     *
     * @return string
     */
    public function createKeypair($region,$data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://compute.' .$region. '.cloud.global.fujitsu.com/v2/' .$Auth['project_id']. '/os-keypairs \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Delete a keypair against K5 API
     *
     * https://compute.jp-east-1.cloud.global.fujitsu.com/v2.0/PROJECT_ID/os-keypairs
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Compute\Keypair\getKeypairs()
     *
     * @return string
     */
    public function deleteKeypair($region,$keypair_name){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X DELETE https://compute.' .$region. '.cloud.global.fujitsu.com/v2/' .$Auth['project_id']. '/os-keypairs/'.$keypair_name.' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



}
