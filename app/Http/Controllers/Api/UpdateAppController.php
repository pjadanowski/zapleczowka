<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;

class UpdateAppController extends Controller
{
    function pull() {
         $output = new BufferedOutput;
         
        $res = Artisan::call('app:pull', [], $output);

        return new JsonResponse(['status' => $res, 'output' => $output->fetch()]);
    }
}
