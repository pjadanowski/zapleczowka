<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public function __construct()
    {
        dd(123);
    }

    public function render(): View
    {
        return view('components.layouts.app');
    }
}
