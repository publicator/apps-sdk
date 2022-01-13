<?php

namespace Publicator\AppsSDK;

use Publicator\AppsSDK\Method\App;
use Publicator\AppsSDK\Method\Auth;
use Publicator\AppsSDK\Method\Communities;
use Publicator\AppsSDK\Method\User;
use Publicator\AppsSDK\Method\Workspaces;
use Timiki\RpcClient\Client as RPCClient;
use Timiki\RpcCommon\JsonResponse;

class Client
{
    const API_URL = 'https://apps.publicator.me/v1';

    private string $apiKey;
    private RPCClient $rpcClient;

    public function __construct(string $apiKey, $options = [])
    {
        $this->apiKey = $apiKey;
        $this->rpcClient = new RPCClient(self::API_URL, null, $options);
    }

    public function call(string $method, array $params = []): JsonResponse
    {
        return $this->rpcClient->call($method, \array_merge($params, ['apiKey' => $this->apiKey]));
    }

    public function user(string $userId): User
    {
        return new User($userId, $this);
    }

    public function auth(): Auth
    {
        return new Auth($this);
    }

    public function communities(string $userId): Communities
    {
        return new Communities($userId, $this);
    }

    public function workspaces(string $userId): Workspaces
    {
        return new Workspaces($userId, $this);
    }

    public function app(): App
    {
        return new App($this);
    }
}
