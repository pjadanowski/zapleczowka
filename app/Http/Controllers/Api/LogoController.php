<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\LogoService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LogoController extends Controller
{
    public function update(Request $request)
    {
        if (! $request->hasFile('logo')) {
            return response()->json([], 400);
        }

        $request->validate([
            'logo' => ['image'],
        ]);
        $logo = $request->file('logo');
        // $path = $request->file('logo')->storeAs(config('app.name') . '_logo.' . $logo->getClientOriginalExtension());

        // update settings
        $logoService = new LogoService;
        $path = $logoService->storeLogo($logo);
        $logoService->updateLogoPath($path = Str::after($path, 'public/'));

        return response()->json(['status' => 'Logo updated', 'path' => url($path)]);
    }

    public function destroy(string $id)
    {
        //
    }
}
