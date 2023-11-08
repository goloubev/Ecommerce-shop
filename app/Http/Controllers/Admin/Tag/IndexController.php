<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $tags = Tag::all();

        return view('admin/tags/index', [
            'tags' => $tags,
        ]);
    }
}
