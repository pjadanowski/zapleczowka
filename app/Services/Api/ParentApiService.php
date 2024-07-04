<?php

namespace App\Services\Api;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

abstract class ParentApiService
{
    protected PendingRequest $http;

    public function __construct()
    {
        $this->http = Http::acceptJson()
            ->contentType('application/json')
            ->withToken(env('RESOURCE_HUB_ACCESS_TOKEN'))
            ->baseUrl($this->baseUrl())
            ->retry(5, 500)
            ->withoutVerifying()
            ->timeout(600);
    }

    protected function baseUrl(): string
    {
        return env('SEO_APP_URL', 'http://localhost:8007') . '/api/v1/';
    }
}
