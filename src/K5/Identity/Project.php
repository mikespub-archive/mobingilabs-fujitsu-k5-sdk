<?php

namespace K5\Identity;

use K5\Token\Auth;

class Project extends Auth
{

    /**
     * List All Projects against K5 API
     *
     * @see https://identity.cloud.global.fujitsu.com/v3/projects
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $domain_id            Customer's domain_id
     *
     * @\K5\Identity\getProjects()
     *
     * @return string
     */
    public function getProjects(){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://identity.cloud.global.fujitsu.com/v3/projects?domain_id='. $Auth['domain_id'] .' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = shell_exec($c);

        return $respond;

    }


    /**
     * Create a project
     * https://identity.cloud.global.fujitsu.com/v3/projects
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $domain_id            domain_id
     * @param $name                 name of the project
     * @param $description          project description
     *
     * @\K5\Identity\createProject()
     *
     * @region global
     */
    public function createProject($name, $description){

        $Auth = Auth::getAuthToken();

        $data = array(
            'project'=>array(
                'description' => $description,
                'domain_id' => $Auth['domain_id'],
                'name' => $name
            )
        );
        $data = json_encode($data, JSON_HEX_QUOT);

        $c = '\
        curl -X POST https://identity.cloud.global.fujitsu.com/v3/projects \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['domain_id'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }

}
