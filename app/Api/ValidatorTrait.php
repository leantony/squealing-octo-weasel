<?php

namespace app\Api;

use Dingo\Api\Exception\StoreResourceFailedException;

trait ValidatorTrait
{
    /**
     * @param array $data
     * @param array $rules
     */
    public function validateRequest(array $data, array $rules){
        $validator = app('validator')->make($data, $rules);

        if ($validator->fails()) {
            throw new StoreResourceFailedException('Could not create resource.', $validator->errors());
        }
    }

}