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


    /**
     * create LoadBalanser against K5 API
     *
     *https://loadbalancing.ja-east-1.cloud.global.fujitsu.com/?Action=CreateLoadBalancer&LoadBalancerName=suna-test-01&Subnets.member.1=491559ae-0d28-4787-8f7a-9c6ca802ac3b
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $loadbalanername      LoadBalancerName require
     * @param $subnet               Subnets.member.N require
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\createLoadBalancer()
     *
     * @return string
     */
    public function createLoadBalancer($region, $loadblancername, $subnet, $Number){

        $Auth = Auth::getAuthToken();

        $c = '\
          curl -X POST https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=CreateLoadBalancer
        &LoadBalancerName='.$loadblancername.'
        &Subnets.member.'.$number.'='.$subnet.'
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }

    /**
     * create LoadBalancerListeners against K5 API
     *
     *https://loadbalancing.ja-east-1.cloud.global.fujitsu.com/?Action=CreateLoadBalancerListeners&LoadBalancerName=MyLB01&Protocol=https&LoadBalancerPort=443&InstancePort=80&InstanceProtocol=http&SSLCertificateId=1232d7bf-8f28-4cc7-a63d-44e218853c6d
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $loadbalanername      LoadBalancerName require
     * @param $Protocol             http require
     * @param $LoadBalancerPort     80 require
     * @param $InstancePort         80 require
     * @param $InstanceProtocol     http  require
     * @param $SSLCertificateId     SSLCertificateId require
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\createLoadBalancerLsitner()
     *
     * @return string
     */
    public function createLoadBalancerListener($region, $loadblancername, $subnet){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=CreateLoadBalancerListeners
        &LoadBalancerName='.$loadblancername.'
        &Protocol='.$protocol.'
        &LoadBalancerPort='.$loadbalancerport.'
        &InstancePort='.$instaneport.'
        &InstanceProtocol='.$instanceprotocol.'
        &SSLCertificateId='.$sslcertificateid.' \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }



}
