<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class UpdateAppController extends Controller
{
    function pull() {
        $res = Artisan::call('app:pull');

        return new JsonResponse(['status' => $res]);
    }
}
