<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['name'] = $data['first_name'].' '.$data['last_name'];

        $userId = User::firstOrCreate([
            'email' => $data['email'] // Unique email
        ], $data);

        return redirect()->route('admin.user.show', $userId)->with('success', 'Successfully created');
    }
}
