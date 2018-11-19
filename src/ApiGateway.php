<?php

namespace Byte5\LaravelHarvest;

use Zttp\Zttp;

class ApiGateway
{
    /**
     * @param $path
     * @return mixed
     */
    public function execute($data)
    {
        $path = $data['url'];
        $method = $data['method'] ?? 'GET';
        $body = $data['body'] ?? null;

        $request = Zttp::withHeaders([
            'Authorization' => 'Bearer '.config('harvest.api_key'),
            'Harvest-Account-Id' => config('harvest.account_id'),
        ]);

        if($method === 'GET'){
            return $request->get($path);
        }elseif($method === 'POST'){
            return $request->post($path, $body);
        }elseif($method === 'PATCH'){
            return $request->patch($path, $body);
        }
    }
}
