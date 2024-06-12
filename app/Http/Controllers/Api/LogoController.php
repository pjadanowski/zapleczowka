<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TemplateService;
use Illuminate\Http\Request;

class LogoController extends Controller
{

    public function update(Request $request, string $id)
    {
        if (!$request->hasFile('logo')) {
            return response()->json([], 400);
        }

        $request->validate([
            'logo' => ['image'],
        ]);
        $logo = $request->file('logo');
        $path = $request->file('logo')->storeAs(config('app.name') . '_logo.' . $logo->getClientOriginalExtension());

        // update settings
        (new TemplateService)->updateLogoPath($path);

        return response()->json(['status' => 'Logo updated']);
    }

    public function destroy(string $id)
    {
        //
    }
}
