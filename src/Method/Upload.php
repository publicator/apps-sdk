<?php

namespace Publicator\AppsSDK\Method;

use GuzzleHttp\Client;
use Timiki\RpcCommon\JsonResponse;

class Upload extends AbstractUserMethod
{
    public function getUploadURL(string $type): JsonResponse
    {
        return $this->call('upload.getUploadURL', ['type' => $type]);
    }

    public function uploadImage(string $filename): array
    {
        $uploadUrl = $this->getUploadURL('image');

        if ($uploadUrl->isError()) {
            throw new \Exception('Failed get upload url');
        }

        $client = new Client();
        $result = $client->post($uploadUrl->getResult(), [
            'multipart' => [
                [
                    'name' => 'file',
                    'filename' => basename($filename),
                    'contents' => file_get_contents($filename),
                ],
            ],
        ]);

        if (200 !== $result->getStatusCode() || 0 === $result->getBody()->getSize()) {
            throw new \Exception('Failed get upload file');
        }

        return json_decode($result->getBody()->getContents(), true);
    }
}
