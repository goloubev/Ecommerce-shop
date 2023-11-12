<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class CreateController extends Controller
{
    public function __invoke(): View
    {
        return view('admin/groups/create');
    }
}
