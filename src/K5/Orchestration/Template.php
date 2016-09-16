<?php

namespace K5\Orchestration;

use K5\Token\Auth;

class Template extends Auth
{

    /**
     * Validate a HEAT Template
     *
     * @see https://orchestration.jp-east-1.cloud.global.fujitsu.com/v1/{project_id}/validate
     *
     * @param $region               Specify region
     *
     * @\K5\Orchestration\validateTemplate()
     *
     * @return string
     */
    public function validateTemplate($region, $data){

        $Auth = Auth::getAuthToken();

        // $data in json format
        //
        // $data = array(
        //     'template' => '' //template string
        // );
        // $data = json_encode($data, JSON_HEX_QUOT);

        $c = '\
        curl -X POST https://orchestration.' .$region. '.cloud.global.fujitsu.com/v1/' .$Auth['project_id']. '/validate \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }




    /**
     * Get the stack's template
     *
     * @see https://orchestration.jp-east-1.cloud.global.fujitsu.com/v1/{project_id}/stacks/{stack_name}/{stack_id}/template
     *
     * @param $region               Specify region
     *
     * @\K5\Orchestration\getStackTemplate()
     *
     * @return string
     */
    public function getStackTemplate($region, $stack_id, $stack_name){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://orchestration.' .$region. '.cloud.global.fujitsu.com/v1/' .$Auth['project_id']. '/stacks/'.$stack_name.'/'.$stack_id.'/template \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }




}
