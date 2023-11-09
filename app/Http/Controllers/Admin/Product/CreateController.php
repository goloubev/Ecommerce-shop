<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class CreateController extends Controller
{
    public function __invoke(): View
    {
        return view('admin/colors/create');
    }
}
