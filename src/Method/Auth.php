<?php

namespace Publicator\AppsSDK\Method;

use Timiki\RpcCommon\JsonResponse;

class Auth extends AbstractMethod
{
    public function getByToken($token): JsonResponse
    {
        return $this->call('user.getByToken', ['token' => $token]);
    }
}
