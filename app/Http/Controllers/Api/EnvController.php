<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class EnvController extends Controller
{
    public function update(Request $request)
    {
        $env = file_get_contents(base_path('.env'));
        if ($request->appName) {
            $env = preg_replace('/APP_NAME=(.*)/', 'APP_NAME=' . $request->appName, $env);
        }

        file_put_contents(base_path('.env'), $env);
    }

    function setBearerToken(Request $request)
    {
        $token = $request->token;
        Artisan::call('app:env-set-resourceHubAccessToken', [
            'token' => $token,
        ]);
    }
}
