<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryListController extends Controller
{
    public function index()
    {
        $categories = new Category();
        $category = $categories->index();
        return view('session.menu', [
            'categories' => $category,
        ]);
    }
}
