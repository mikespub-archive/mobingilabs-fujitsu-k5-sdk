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
     * describe LoadBalansers against K5 API
     *
     * https://loadbalancing.ja-east-1.cloud.global.fujitsu.com/?LoadBalancerNames.member.1=MyLB01&Action=DescribeLoadBalancers
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $number
     * @param $loadbalancername
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\getLoadBalancerDetail()
     *
     * @return string
     */
    public function getLoadBalancerDetail($region, $number, $loadbalancername){

        $Auth = Auth::getAuthToken();

        //sample $data structure
        // $data = array(
        //         'LoadBalancerNames.member.1' => ''
        // );
        // $data = json_encode($data, JSON_HEX_QUOT);

        $c = '\
        curl -X GET "https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=DescribeLoadBalancers&LoadBalancerNames.member.'.$number.'='.$loadbalancername.'" \
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
     * @param $data
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\createLoadBalancer()
     *
     * @return string
     */
    public function createLoadBalancer($region, $data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=CreateLoadBalancer \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
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
     * @param $data
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\createLoadBalancerLsitner()
     *
     * @return string
     */
    public function createLoadBalancerListener($region, $data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=CreateLoadBalancerListeners \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
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
     * @param $data
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\deleteLoadBalancer()
     *
     * @return string
     */
    public function deleteLoadBalancer($region, $data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X DELETE https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=DeleteLoadBalancer \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
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
     * @param $data
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\deleteLoadBalancerListener()
     *
     * @return string
     */
    public function deleteLoadBalancerListener($region, $data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X DELETE https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=DeleteLoadBalancerListeners \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
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
     * @param $loadbalancername
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\describeLoadBalancerAttribute()
     *
     * @return string
     */
    public function describeLoadBalancerAttribute($region, $loadbalancername){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET "https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=DescribeLoadBalancerAttributes&LoadBalancerName=' .$loadbalancername. '" \
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
     * @param $data
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\detachLoadBalancerFromSubnet()
     *
     * @return string
     */
    public function detachLoadBalancerFromSubnet($region, $data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=DetachLoadBalancerFromSubnets \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Modify LoadBalancerAttributes K5 API
     *
     * https://loadbalancing.ja-east-1.cloud.global.fujitsu.com/?Action=ModifyLoadBalancerAttributes&LoadBalancerName=MyLB01&LoadBalancerAttributes.ConnectionSettings.IdleTimeout=30
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $data
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\modifyLoadBalancerAttribute()
     *
     * @return string
     */
    public function modifyLoadBalancerAttribute($region, $data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=ModifyLoadBalancerAttributes \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Register InstancesWithLoadBalancer K5 API
     *
     * https://loadbalancing.ja-east-1.cloud.global.fujitsu.com/?Action=RegisterInstancesWithLoadBalancer&LoadBalancerName=MyLB01&Instances.member.1.InstanceId=i-315b7e51
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $data
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\registerInstancesWithLoadBalancer()
     *
     * @return string
     */
    public function registerInstancesWithLoadBalancer($region, $data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=RegisterInstancesWithLoadBalancer \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Set LoadBalancerListenerSSLCertificate K5 API
     *
     * https://loadbalancing.ja-east-1.cloud.global.fujitsu.com/?Action=SetLoadBalancerListenerSSLCertificate&LoadBalancerName=MyLB01&SSLCertificateId=5c349f63-a874-47ed-b09e-9da913cbbbde&LoadBalancerPort=443
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $data
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\setLoadBalancerListenerSSLCertificate()
     *
     * @return string
     */
    public function setLoadBalancerListenerSSLCertificate($region, $data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=SetLoadBalancerListenerSSLCertificate \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Set LoadBalancerPoliciesOfListener K5 API
     *
     *https://loadbalancing.ja-east-1.cloud.global.fujitsu.com/?Action=SetLoadBalancerPoliciesOfListener&LoadBalancerName=MyLB01&PolicyNames.member.1=MyLoadBalancerCookiePolicy&LoadBalancerPort=80
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $data
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\setLoadBalancerPoliciesOfListener()
     *
     * @return string
     */
    public function setLoadBalancerPoliciesOfListener($region, $data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X PUT https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=SetLoadBalancerPoliciesOfListener \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Attach LoadBalancerToSubnets K5 API
     *
     *https://loadbalancing.ja-east-1.cloud.global.fujitsu.com/?Action=AttachLoadBalancerToSubnets&Subnets.member.1=subnet-3561b05e&LoadBalancerName=MyLB01
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $data
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\attachLoadBalancerToSubnets()
     *
     * @return string
     */
    public function attachLoadBalancerToSubnets($region, $data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=AttachLoadBalancerToSubnets \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Create LBCookieStickinessPolicy K5 API
     *
     *https://loadbalancing.(リージョン名).cloud.global.fujitsu.com/?Action=CreateLBCookieStickinessPolicy&LoadBalancerName=MyLB01&PolicyName=MyLoadBalancerCookiePolicy&CookieExpirationPeriod=60
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     * @param $data
     *
     * @region specific
     *
     * @\K5\Networking\LoadBalancer\createLBCookieStickinessPolicy()
     *
     * @return string
     */
    public function createLBCookieStickinessPolicy($region, $data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://loadbalancing.' .$region. '.cloud.global.fujitsu.com/?Action=CreateLBCookieStickinessPolicy \
      -H "Content-Type: application/json" \
      -H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }


}
