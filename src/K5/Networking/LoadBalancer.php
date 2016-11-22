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
    public function createLoadBalancer($region, $loadblancername, $subnet, $number){

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
    public function createLoadBalancerListener($region, $loadblancername, $subnet, $number){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=CreateLoadBalancerListeners
        &Listeners.member.'.$number.'.LoadBalancerName='.$loadblancername.'
        &Listeners.member.'.$number.'.Protocol='.$protocol.'
        &Listeners.member.'.$number.'.LoadBalancerPort='.$loadbalancerport.'
        &Listeners.member.'.$number.'.InstancePort='.$instaneport.'
        &Listeners.member.'.$number.'.InstanceProtocol='.$instanceprotocol.'
        &Listeners.member.'.$number.'.SSLCertificateId='.$sslcertificateid.' \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * delete LoadBalancer against K5 API
     *
     *https://loadbalancing.ja-east-1.cloud.global.fujitsu.com/?Action=DeleteLoadBalancer&LoadBalancerName=MyLB01
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $loadbalanername      LoadBalancerName require
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\deleteLoadBalancer()
     *
     * @return string
     */
    public function deleteLoadBalancer($region, $loadblancername){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X DELETE https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=DeleteLoadBalancer
        &LoadBalancerName='.$loadblancername.' \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * delete LoadBalancerListeners against K5 API
     *
     *https://loadbalancing.ja-east-1.cloud.global.fujitsu.com/?Action=DeleteLoadBalancerListeners&LoadBalancerName=MyLB01&LoadBalancerPorts.member.1=22
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $loadbalanername      LoadBalancerName require
     * @param $LoadBalancerPort     LoadBalancerPort require
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\deleteLoadBalancerListener()
     *
     * @return string
     */
    public function deleteLoadBalancerListener($region, $loadblancername, $loadbalanerport, $number){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X DELETE https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=DeleteLoadBalancerListeners
        &LoadBalancerName='.$loadblancername.'
        &LoadBalancerPorts.member.'.$menber.'='.$loadbalancerport.' \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Describe LoadBalancerAttributes K5 API
     *
     * https://loadbalancing.ja-east-1.cloud.global.fujitsu.com/?Action=DescribeLoadBalancerAttributes&LoadBalancerName=MyLB01&Instances.member.1.InstanceId=i-e3677ad7
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $loadbalanername      LoadBalancerName requred
     * @param $instanceid           InstanceId requred
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\describeLoadBalancerAttribute()
     *
     * @return string
     */
    public function describeLoadBalancerAttribute($region, $loadbalancername, $instanceid, $number){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=DescribeLoadBalancerAttributes
        &LoadBalancerName='.$loadbalancername.'
        &Instances.member.'.$number.'.InstanceId='.$instanceid.' \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Detach LoadBalancerFromSubnets K5 API
     *
     * https://loadbalancing.ja-east-1.cloud.global.fujitsu.com/?Action=DetachLoadBalancerFromSubnets&LoadBalancerName=MyLB01&Subnets.member.1=MySubnet-XXXXX
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $loadbalanername      LoadBalancerName requred
     * @param $subnet               Subnets.member.x requred
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\detachLoadBalancerFromSubnet()
     *
     * @return string
     */
    public function detachLoadBalancerFromSubnet($region, $loadbalancername, $subnet, $number){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=DetachLoadBalancerFromSubnets
        &LoadBalancerName='.$loadbalancername.'
        &Subnets.member.'.$number.'=MySubnet-'.$subnet.' \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Modify LoadBalancerAttributes K5 API
     *
     *https://loadbalancing.ja-east-1.cloud.global.fujitsu.com/?Action=ModifyLoadBalancerAttributes&LoadBalancerName=MyLB01&LoadBalancerAttributes.ConnectionSettings.IdleTimeout=30
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $loadbalanername      LoadBalancerName requred
     * @param $idletimeout          IdleTimeout requred
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\modifyLoadBalancerAttribute()
     *
     * @return string
     */
    public function modifyLoadBalancerAttribute($region, $loadbalancername, $idletimeout){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X PUT https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=ModifyLoadBalancerAttributes
        &LoadBalancerName='.$loadbalancername.'
        &LoadBalancerAttributes.ConnectionSettings.IdleTimeout='.$idletimeout.' \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Register InstancesWithLoadBalancer K5 API
     *
     *https://loadbalancing.ja-east-1.cloud.global.fujitsu.com/?Action=RegisterInstancesWithLoadBalancer&LoadBalancerName=MyLB01&Instances.member.1.InstanceId=i-315b7e51
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $loadbalanername      LoadBalancerName requred
     * @param $instanceid           InstanceId requred
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\registerInstancesWithLoadBalancer()
     *
     * @return string
     */
    public function registerInstancesWithLoadBalancer($region, $loadbalancername, $instanceid, $number){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X PUT https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=RegisterInstancesWithLoadBalancer
        &LoadBalancerName='.$loadbalancername.'
        &Instances.member.'.$number.'.InstanceId='.$instanceid.' \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }

}
