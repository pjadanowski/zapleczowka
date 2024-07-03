<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EnvService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;

class UpdateAppController extends Controller
{
    public function pull(Request $request)
    {
        // set version in env
        if ($request->version) {
            // TODO: set in config file // because updating env restarts server
            // EnvService::updateVariable('APP_VERSION', $request->version, true);
        }

        $output = new BufferedOutput;

        $res = Artisan::call('app:pull', [], $output);

        return new JsonResponse(['status' => $res, 'output' => $output->fetch()]);
    }
}
