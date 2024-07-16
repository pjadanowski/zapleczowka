<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Output\BufferedOutput;
use Illuminate\Support\Facades\Process;

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

        $result = Process::run('ls -la');
        // $result = \exec('cd .. && sh gitPull.sh', $outputArr);
        Log::debug('gitPull', $outputArr);

        // return new JsonResponse(['status' => $result, 'output' => $outputArr]);
        return new JsonResponse(['status' => $result->successful(), 'output' => $result->output()]);
    }
}
