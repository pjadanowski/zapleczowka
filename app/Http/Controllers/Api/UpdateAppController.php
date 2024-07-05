<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Output\BufferedOutput;

class UpdateAppController extends Controller
{
    public function pull(Request $request)
    {
        // set version in env
        if ($request->version) {
            // set in config file // because updating env restarts server
        }

        $output = new BufferedOutput;
        $outputArr = [];

        $res = exec('cd .. && sh gitPull.sh', $outputArr);
        Log::debug('gitPull', $outputArr);

        return new JsonResponse(['status' => $res, 'output' => $outputArr]);
    }
}
