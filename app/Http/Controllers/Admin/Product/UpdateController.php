<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Color\UpdateRequest;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Color $color): RedirectResponse
    {
        $data = $request->validated();
        $data['title'] = strToUpper($data['title']);
        $color->update($data);

        return redirect()->route('admin.color.show', $color)->with('success', 'Successfully updated');
    }
}
