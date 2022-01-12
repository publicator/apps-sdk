<?php

namespace Publicator\AppsSDK\Method;

use Publicator\AppsSDK\Client;
use Timiki\RpcCommon\JsonResponse;

abstract class AbstractMethod
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    protected function call(string $method, array $params = []): JsonResponse
    {
        return $this->client->call($method, $params);
    }
}
