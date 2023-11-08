<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Color\StoreRequest;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['title'] = strToUpper($data['title']);
        $colorId = Color::create($data);

        return redirect()->route('admin.color.show', $colorId)->with('success', 'Successfully created');
    }
}
