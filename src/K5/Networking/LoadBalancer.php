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
    public function getLoadBalancers($region ,$data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=DescribeLoadBalancers \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';
    //   $c = '\
    //   curl -X GET https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=DescribeLoadBalancers \
    // -H "Content-Type: application/json" \
    // -H "X-Auth-Token: '. $Auth['token'] .'" \
    // -d \''. $data .'\' \
    //   ';

        $respond = exec($c);

        return $respond;

    }


    // /**
    //  * create LoadBalanser against K5 API
    //  *
    //  * https://loadbalancing.ja-east-1.cloud.global.fujitsu.com/?LoadBalancerNames.member.1=MyLB01&Action=DescribeLoadBalancers
    //  *https://loadbalancing.(リージョン名).cloud.global.fujitsu.com/?
    //  *LoadBalancerName=MyLB01
    //  *&Listeners.member.1.LoadBalancerPort=80
    //  *¥&Listeners.member.1.InstancePort=80
    //  *&Listeners.member.1.Protocol=http
    //  *&Listeners.member.1.InstanceProtocol=http
    //  *&Scheme=internal
    //  *&Subnets.member.1=subnet-3561b05d
    //  *&Version=2014-11-01
    //  *&Action=CreateLoadBalancer
    //  *
    //  * @param $token                Token used for HTTP request header authentication
    //  * @param $region               Specify region
    //  * @param $loadbalanername      LoadBalancerNames.member.N
    //  *
    //  * @region specific
    //  *
    //  * @\K5\Networking\LoadBalancer\createLoadBalancer()
    //  *
    //  * @return string
    //  */
    // public function createLoadBalancer($region){
    //
    //     $Auth = Auth::getAuthToken();
    //
    //     $c = '\
    //     curl -X GET https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=CreateLoadBalancer \
    // 	-H "Content-Type: application/json" \
    // 	-H "X-Auth-Token: '. $Auth['token'] .'" \
    //   -d \''. $data .'\' \
    //     ';
    //
    //     $respond = exec($c);
    //
    //     return $respond;
    //
    // }


}
