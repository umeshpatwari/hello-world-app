<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BigCommerceAuthController extends Controller
{
    public function redirectToBigCommerce()
    {
        $url = 'https://login.bigcommerce.com/oauth2/authorize';
        $query = http_build_query([
            'client_id' => env('BC_CLIENT_ID'),
            'redirect_uri' => env('BC_REDIRECT_URL'),
            'response_type' => 'code',
            'scope' => 'store_v2_products',
        ]);
        return redirect("$url?$query");
    }

    public function handleBigCommerceCallback(Request $request)
    {
        $code = $request->input('code');

        $client = new Client();
        $response = $client->post('https://login.bigcommerce.com/oauth2/token', [
            'form_params' => [
                'client_id' => env('BC_CLIENT_ID'),
                'client_secret' => env('BC_CLIENT_SECRET'),
                'redirect_uri' => env('BC_REDIRECT_URL'),
                'code' => $code,
                'grant_type' => 'authorization_code',
            ],
        ]);

        $data = json_decode($response->getBody()->getContents());
        $access_token = $data->access_token;
        $store_hash = $data->context;

        // Store the $access_token and $store_hash securely in your application (e.g., in the .env file).

        return "Access Token: $access_token<br>Store Hash: $store_hash";
    }
}

