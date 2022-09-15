<?php

namespace Publicator\AppsSDK;

use Publicator\AppsSDK\Method\Api;
use Publicator\AppsSDK\Method\App;
use Publicator\AppsSDK\Method\Auth;
use Publicator\AppsSDK\Method\Communities;
use Publicator\AppsSDK\Method\Post;
use Publicator\AppsSDK\Method\Upload;
use Publicator\AppsSDK\Method\User;
use Publicator\AppsSDK\Method\Workspaces;
use Timiki\RpcClient as Rpc;
use Timiki\RpcCommon\JsonResponse;

class Client
{
    const API_URL = 'https://apps.publicator.me/';

    private string $apiKey;
    private Rpc\ClientInterface $rpcClient;

    public function __construct(string $apiKey, $options = [], $version = 'v2')
    {
        $this->apiKey = $apiKey;
        $this->rpcClient = new Rpc\Client(self::API_URL.$version, $options);
    }

    public function getRpcClient(): Rpc\ClientInterface
    {
        return $this->rpcClient;
    }

    public function call(string $method, array $params = []): JsonResponse
    {
        return $this->getRpcClient()->call($method, \array_merge($params, ['apiKey' => $this->apiKey]));
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

    public function upload(string $userId): Upload
    {
        return new Upload($userId, $this);
    }

    public function post(string $userId): Post
    {
        return new Post($userId, $this);
    }

    public function api(string $userId): Api
    {
        return new Api($userId, $this);
    }
}
