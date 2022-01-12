<?php

namespace Publicator\AppsSDK\Method;

use Timiki\RpcCommon\JsonResponse;

class Auth extends AbstractMethod
{
    public function getByCode($code): JsonResponse
    {
        return $this->call('user.getByCode', ['code' => $code]);
    }
}
