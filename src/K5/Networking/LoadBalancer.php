<?php

namespace K5\Networking;

use K5\Token\Auth;

class LoadBalancer extends Auth
{

    /**
     * describe LoadBalansers against K5 API
     *
     * https://loadbalancing.ja-east-1.cloud.global.fujitsu.com/?LoadBalancerNames.member.1=MyLB01&Action=DescribeLoadBalancers
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $loadbalanername      LoadBalancerNames.member.N
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\getLoadBalancers()
     *
     * @return string
     */
    public function getLoadBalancers($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=DescribeLoadBalancers \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }


}
