<?php

namespace Publicator\AppsSDK\Method;

use Timiki\RpcCommon\JsonResponse;

class Workspaces extends AbstractUserMethod
{
    public function getAll(): JsonResponse
    {
        return $this->call('workspaces.getAll');
    }

    public function getById(string $workspaceId): JsonResponse
    {
        return $this->call('workspaces.getById', ['workspaceId' => $workspaceId]);
    }
}
