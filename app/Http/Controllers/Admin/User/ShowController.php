<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;

class ShowController extends Controller
{
    public function __invoke(User $user): View
    {
        return view('admin/users/show', [
            'user' => $user,
        ]);
    }
}
