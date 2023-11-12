<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Contracts\View\View;

class EditController extends Controller
{
    public function __invoke(Group $group): View
    {
        return view('admin/groups/edit', [
            'group' => $group
        ]);
    }
}
