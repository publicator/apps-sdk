<?php

namespace Publicator\AppsSDK\Method;

use Timiki\RpcCommon\JsonResponse;

class App extends AbstractMethod
{
    public function getInfo(): JsonResponse
    {
        return $this->call('app.getInfo');
    }
}
