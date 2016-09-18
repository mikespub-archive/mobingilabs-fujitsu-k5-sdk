<?php

namespace K5\Networking;

use K5\Token\Auth;

class SecurityGroup extends Auth
{

    /**
     * List All Security Groups against K5 API
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/security-groups
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\SecurityGroup\getSecurityGroups()
     *
     * @return string
     */
    public function getSecurityGroups($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/security-groups \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Get Security Group Detail
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/security-groups
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\SecurityGroup\getSecurityGroupsDetail()
     *
     * @return string
     */
    public function getSecurityGroupsDetail($region, $security_group_id){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/security-groups/'.$security_group_id.' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Get Security Group Rules
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/security-group-rules
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\SecurityGroup\getSecurityGroupRules()
     *
     * @return string
     */
    public function getSecurityGroupRules($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/security-group-rules \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Get Security Group Rules Detail
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/security-group-rules/{security_group_rule_id}
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $security_group_rule_id
     *
     * @region specific
     *
     * @\K5\Networking\SecurityGroup\getSecurityGroupRulesDetail()
     *
     * @return string
     */
    public function getSecurityGroupRulesDetail($region, $security_group_rule_id){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/security-group-rules/'.$security_group_rule_id.' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Create A Security Group
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/security-groups
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $data
     *
     * @region specific
     *
     * @\K5\Networking\SecurityGroup\createSecurityGroups()
     *
     * @return string
     */
    public function createSecurityGroup($region, $data){

        $Auth = Auth::getAuthToken();

        // sample $data structure
        // $data = array(
        //     'security_group'=>array(
        //         'name' => '' //your security group name
        //     )
        // );
        // $data = json_encode($data, JSON_HEX_QUOT);

        $c = '\
        curl -X POST https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/security-groups \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;


    }



    /**
     * Delete A Security Group
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/security-groups
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $securitygroup_id
     *
     * @region specific
     *
     * @\K5\Networking\SecurityGroup\deleteSecurityGroups()
     *
     * @return string
     */
    public function deleteSecurityGroup($region, $securitygroup_id){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X DELETE https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/security-groups/'.$security_group_id.' \
        -H "Content-Type: application/json" \
        -H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }





}
