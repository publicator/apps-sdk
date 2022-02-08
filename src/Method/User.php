<?php

namespace Publicator\AppsSDK\Method;

use Timiki\RpcCommon\JsonResponse;

class User extends AbstractUserMethod
{
    public function get(): JsonResponse
    {
        return $this->call('user.getById');
    }

    public function hasPremium(): JsonResponse
    {
        return $this->call('user.hasPremium');
    }
}
