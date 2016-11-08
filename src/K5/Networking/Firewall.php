<?php

namespace K5\Networking;

use K5\Token\Auth;

class Firewall extends Auth
{

    /**
     * List All Firewalls against K5 API
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/fw/firewalls
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\Firewall\getFirewalls()
     *
     * @return string
     */
    public function getFirewalls($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/fw/firewalls \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }

    /**
     * Create Firewalls against K5 API
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/fw/firewalls
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\Firewall\getFirewalls()
     *
     * @return string
     */
    public function createFirewalls($region,$data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/fw/firewalls \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Update Firewalls against K5 API
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/fw/firewalls
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\Firewall\getFirewalls()
     *
     * @return string
     */
    public function updateFirewalls($region,$firewall_id,$data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X PUT https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/fw/firewalls/'.$firewall_id.' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * List All Firewall Policies against K5 API
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/fw/firewall_policies
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\Firewall\getFirewallPolicies()
     *
     * @return string
     */
    public function getFirewallPolicies($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/fw/firewall_policies \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Create Firewall Policies against K5 API
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/fw/firewall_policies
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\Firewall\getFirewallPolicies()
     *
     * @return string
     */
    public function createFirewallPolicies($region,$data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/fw/firewall_policies \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Create Firewall Policies against K5 API
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/fw/firewall_policies
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\Firewall\getFirewallPolicies()
     *
     * @return string
     */
    public function updateFirewallPolicies($region,$policy_id,$data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X PUT https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/fw/firewall_policies/'.$policy_id.' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * List All Firewall Rules against K5 API
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/fw/firewall_rules
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\Firewall\getFirewallRules()
     *
     * @return string
     */
    public function getFirewallRules($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/fw/firewall_rules \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Create Firewall Rules against K5 API
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/fw/firewall_rules
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\Firewall\getFirewallRules()
     *
     * @return string
     */
    public function createFirewallRules($region,$data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/fw/firewall_rules \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }



    /**
     * Update Firewall Rules against K5 API
     *
     * https://networking.jp-east-1.cloud.global.fujitsu.com/v2.0/fw/firewall_rules
     *
     * @param $token                Token used for HTTP request header authentication
     * @param $region               Specify region
     *
     * @region specific
     *
     * @\K5\Networking\Firewall\getFirewallRules()
     *
     * @return string
     */
    public function updateFirewallRules($region,$fwrule_id,$data){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X POST https://networking.' .$region. '.cloud.global.fujitsu.com/v2.0/fw/firewall_rules/'.$fwrule_id.' \
        -H "Content-Type: application/json" \
        -H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }




}
