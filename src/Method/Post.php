<?php

namespace Publicator\AppsSDK\Method;

use Timiki\RpcCommon\JsonResponse;

class Post extends AbstractUserMethod
{
    public function create(array $post = []): JsonResponse
    {
        return $this->call('posts.create', $post);
    }
}
