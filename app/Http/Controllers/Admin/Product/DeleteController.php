<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;

class DeleteController extends Controller
{
    public function __invoke(Color $color): RedirectResponse
    {
        $color->delete();

        return redirect()->route('admin.color.index')->with('success', 'Successfully deleted');
    }
}
