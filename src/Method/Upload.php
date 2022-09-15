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

    public function upload(string $type, string $filename): array
    {
        $uploadUrl = $this->getUploadURL($type);

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

    public function uploadImage(string $filename): array
    {
        $basename = explode('.', basename(strtolower($filename)));

        if (($basename[1] ?? null) === 'gif') {
            return $this->uploadGif($filename);
        }

        return $this->upload('image', $filename);
    }

    public function uploadVideo(string $filename): array
    {
        return $this->upload('video', $filename);
    }

    public function uploadAudio(string $filename): array
    {
        return $this->upload('audio', $filename);
    }

    public function uploadGif(string $filename): array
    {
        return $this->upload('gif', $filename);
    }
}
