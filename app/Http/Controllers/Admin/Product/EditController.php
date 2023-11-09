<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Contracts\View\View;

class EditController extends Controller
{
    public function __invoke(Color $color): View
    {
        return view('admin/colors/edit', [
            'color' => $color
        ]);
    }
}
