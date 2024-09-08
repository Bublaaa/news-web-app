<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class LandingPageController extends Controller
{
    public function showNews(){
        $categories = Category::get();
        $atricles = Article::where('status','published');
        return view('news')->with([
            'articles' => $atricles,
            'categories' => $categories,
        ]);
    }
}