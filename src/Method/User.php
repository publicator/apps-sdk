<?php

namespace Publicator\AppsSDK\Method;

use Timiki\RpcCommon\JsonResponse;

class User extends AbstractUserMethod
{
    public function get(): JsonResponse
    {
        return $this->call('user.getById');
    }
}
