<?php

namespace Publicator\AppsSDK\Method;

use Timiki\RpcCommon\JsonResponse;

class Api extends AbstractUserMethod
{
    public function vkontakte(string $method, array $params = []): JsonResponse
    {
        return $this->call('api.vkontakte', ['method' => $method, 'params' => $params]);
    }
}
