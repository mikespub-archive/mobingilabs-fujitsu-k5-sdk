<?php

namespace K5\BlockStorage;

use K5\Token\Auth;

class Volume extends Auth
{

    /**
     * Get volumes list against K5 API
     *
     * @see https://blockstorage.jp-east-1.cloud.global.fujitsu.com/v2/volumes
     *
     * @param $region               Specify region
     *
     * @\K5\BlockStorage\getVolumes()
     *
     * @return string
     */
    public function getVolumes($region){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://blockstorage.' .$region. '.cloud.global.fujitsu.com/v2/' .$Auth['project_id']. '/volumes/detail \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }

    /**
     * Show details of a volume
     *
     * @see https://blockstorage.jp-east-1.cloud.global.fujitsu.com/v2/volumes/{volume_id}
     *
     * @param $region               Specify region
     *
     * @\K5\BlockStorage\getVolumes()
     *
     * @return string
     */
    public function getVolumeDetail($region, $volume_id){

        $Auth = Auth::getAuthToken();

        $c = '\
        curl -X GET https://blockstorage.' .$region. '.cloud.global.fujitsu.com/v2/' .$Auth['project_id']. '/volumes/' .$volume_id. ' \
    	-H "Content-Type: application/json" \
    	-H "X-Auth-Token: '. $Auth['token'] .'" \
        ';

        $respond = exec($c);

        return $respond;

    }


    /**
     * Create a volume (block storage)
     *
     * @see https://blockstorage.jp-east-1.cloud.global.fujitsu.com/v2/volumes
     *
     * @param $region               Specify region
     *
     * @\K5\BlockStorage\createVolumes()
     *
     * @return string
     */
    public function createVolumes($region, $data){

        $Auth = Auth::getAuthToken();

        //Pass $data parameter in json encoded formart
        //
        // $data = array(
        //     'volumes'=>array(
        //         'name' => $name,
        //         "availability_zone" => $az,
        //         "source_volid" => $source_volid,
        //         "description" => $description,
        //         "snapshot_id" => $snapshot_id,
        //         "size" => $size,
        //         "imageRef" =>$imageRef,
        //         "volume_type" => $volume_type
        //     )
        // );
        // $data = json_encode($data, JSON_HEX_QUOT);


        $c = '\
        curl -X GET https://blockstorage.' .$region. '.cloud.global.fujitsu.com/v2/' .$Auth['project_id']. '/volumes \
        -H "Content-Type: application/json" \
        -H "X-Auth-Token: '. $Auth['token'] .'" \
        -d \''. $data .'\' \
        ';

        $respond = exec($c);

        return $respond;

    }



}
