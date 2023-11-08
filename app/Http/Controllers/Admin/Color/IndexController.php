<?php

namespace App\Http\Controllers\Admin\Color;

use App\Models\Color;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $colors = Color::all();

        return view('admin/colors/index', [
            'colors' => $colors,
        ]);
    }
}
