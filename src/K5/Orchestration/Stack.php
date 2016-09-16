<?php

namespace K5\Orchestration;

use K5\Token\Auth;

class Stack extends Auth
{

    /**
     * Create a Stack from Heat Template
     * For more details on parameter structure, please check OpenStack's HOT API Documentation
     * @reference http://developer.openstack.org/api-ref-orchestration-v1.html
     *
     * @see https://orchestration.jp-east-1.cloud.global.fujitsu.com/v1/{project_id}/stacks/{stack_name}/{stack_id}
     *
     * @param $region               Specify region
     *
     * @\K5\Orchestration\Stack\createStack()
     *
     * @return string
     */
    public function createStack($region, $data){

        $Auth = Auth::getAuthToken();

        // $data in json format, eg:
        // $data = '{
        //     "stack_name": "'.$stack_name.'",
        //     "template": "'.$template_body.'",
        //     "parameters": "'.$params.'"
        // }';

        $c = '\
        curl -X POST https://orchestration.' .$region. '.cloud.global.fujitsu.com/v1/' .$Auth['project_id']. '/stacks \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }




    /**
     * Delete a Stack
     *
     * @see https://orchestration.jp-east-1.cloud.global.fujitsu.com/v1/{project_id}/stacks/{stack_name}/{stack_id}
     *
     * @param $region               Specify region
     *
     * @\K5\Orchestration\Stack\deleteStack()
     *
     * @return Header 204 No Content
     */
    public function deleteStack($region, $stack_id, $stack_name){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X DELETE https://orchestration.' .$region. '.cloud.global.fujitsu.com/v1/'. $Auth['project_id'] .'/stacks/'. $stack_name .'/'. $stack_id .' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Describe stack information
     *
     * @see https://orchestration.jp-east-1.cloud.global.fujitsu.com/v1/{project_id}/stacks/{stack_name}/{stack_id}
     *
     * @param $region               Specify region
     *
     * @\K5\Orchestration\Stack\getStackDetails()
     *
     * @return string
     */
    public function getStackDetails($region, $stack_id, $stack_name){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://orchestration.' .$region. '.cloud.global.fujitsu.com/v1/'. $Auth['project_id'] .'/stacks/'. $stack_name .'/'. $stack_id .' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Describe stack events
     *
     * @see https://orchestration.jp-east-1.cloud.global.fujitsu.com/v1/{project_id}/stacks/{stack_name}/{stack_id}/events
     *
     * @param $region               Specify region
     *
     * @\K5\Orchestration\Stack\getStackEvents()
     *
     * @return string
     */
    public function getStackEvents($region, $stack_id, $stack_name){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://orchestration.' .$region. '.cloud.global.fujitsu.com/v1/'. $Auth['project_id'] .'/stacks/'. $stack_name .'/'. $stack_id .'/events \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Describe stack resources
     *
     * @see https://orchestration.jp-east-1.cloud.global.fujitsu.com/v1/{project_id}/stacks/{stack_name}/{stack_id}/resources
     *
     * @param $region               Specify region
     *
     * @\K5\Orchestration\Stack\getStackResources()
     *
     * @return string
     */
    public function getStackResources($region, $stack_id, $stack_name){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://orchestration.' .$region. '.cloud.global.fujitsu.com/v1/'. $Auth['project_id'] .'/stacks/'. $stack_name .'/'. $stack_id .'/resources \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * List all stacks
     * For more details on parameter structure, please check OpenStack's HOT API Documentation
     * @reference http://developer.openstack.org/api-ref-orchestration-v1.html
     *
     * @see https://orchestration.jp-east-1.cloud.global.fujitsu.com/v1/{project_id}/stacks
     *
     * @param $region               Specify region
     *
     * @\K5\Orchestration\Stack\listStacks()
     *
     * @return string
     */
    public function listStacks($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://orchestration.' .$region. '.cloud.global.fujitsu.com/v1/'. $Auth['project_id'] .'/stacks \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }





}
