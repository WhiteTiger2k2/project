<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IntroduceController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('pages.introduce', [
            'categories' => $categories,
        ]);
    }
}
