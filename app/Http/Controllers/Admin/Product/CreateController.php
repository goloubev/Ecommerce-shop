<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

class CreateController extends Controller
{
    public function __invoke(): View
    {
        $categories = Category::all();
        $groups = Group::all();
        $tags = Tag::all();
        $colors = Color::all();

        return view('admin/products/create', [
            'categories' => $categories,
            'groups' => $groups,
            'tags' => $tags,
            'colors' => $colors,
        ]);
    }
}
