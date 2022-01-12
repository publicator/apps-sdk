<?php

namespace Publicator\AppsSDK\Method;

use Publicator\AppsSDK\Client;
use Timiki\RpcCommon\JsonResponse;

abstract class AbstractUserMethod extends AbstractMethod
{
    private string $userId;

    public function __construct(string $userId, Client $client)
    {
        parent::__construct($client);

        $this->userId = $userId;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    protected function call(string $method, array $params = []): JsonResponse
    {
        return parent::call($method, array_merge($params, ['userId' => $this->userId]));
    }
}
