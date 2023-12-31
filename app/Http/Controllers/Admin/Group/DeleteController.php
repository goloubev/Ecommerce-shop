<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\RedirectResponse;

class DeleteController extends Controller
{
    public function __invoke(Group $group): RedirectResponse
    {
        $group->delete();

        return redirect()->route('admin.group.index')->with('success', 'Successfully deleted');
    }
}
