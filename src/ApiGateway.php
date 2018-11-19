<?php

namespace Byte5\LaravelHarvest;

use Zttp\Zttp;

class ApiGateway
{
    /**
     * @param $path
     * @return mixed
     */
    public function execute($path, $method = 'GET', $data = [])
    {
        $request = Zttp::withHeaders([
            'Authorization' => 'Bearer '.config('harvest.api_key'),
            'Harvest-Account-Id' => config('harvest.account_id'),
        ]);

        return $method == 'GET' ? $request->get($path) : $request->post($path, $data);
    }
}
