<?php

namespace App\Services\Api;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

abstract class ParentApiService
{
    protected PendingRequest $http;

    public function __construct()
    {
        $this->http = Http::withHeaders([
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
        ])
            ->withToken(env('SEO_APP_TOKEN'))
            ->baseUrl($this->baseUrl())
            ->retry(5, 500)
            ->withoutVerifying()
            ->timeout(600);
    }

    private function baseUrl(): string
    {
        return env('SEO_APP_URL', 'localhost:8007/api/v1') . '/api/v1/';
    }
}
