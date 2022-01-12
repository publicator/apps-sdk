<?php

namespace Publicator\AppsSDK\Method;

use Timiki\RpcCommon\JsonResponse;

class Communities extends AbstractUserMethod
{
    public function getAll(): JsonResponse
    {
        return $this->call('communities.getAll');
    }

    public function getById(string $communityId): JsonResponse
    {
        return $this->call('communities.getById', ['communityId' => $communityId]);
    }
}
