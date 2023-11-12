<?php

namespace App\Http\Controllers\Admin\Group;

use App\Models\Group;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $groups = Group::all();

        return view('admin/groups/index', [
            'groups' => $groups,
        ]);
    }
}
