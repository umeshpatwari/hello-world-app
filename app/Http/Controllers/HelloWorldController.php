<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
//use Bigcommerce\Api\Client as BigCommerce;


class HelloWorldController extends Controller
{


    public function helloWorld()
    {
        $client = new Client();
        $response = $client->get('https://api.bigcommerce.com/stores/' . env('BC_STORE_HASH') . '/v3/catalog/products', [
            'headers' => [
                'X-Auth-Token' => env('BC_ACCESS_TOKEN'),
                'Accept' => 'application/json',
            ],
        ]);

        $data = json_decode($response->getBody()->getContents());
        return response()->json($data);
    }
}

