<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Preference;
use App\Models\Article;

class AuthorController extends Controller
{
    public function index(){
        $user = Auth::user();
        $userPreference = Preference::where('user_id',$user->id);
        return view('./layouts/author-page');
    }

    public function articlesIndex(){
        $categories = Category::all();
        $user = Auth::user();
        $userArticles = Article::where('user_id', $user->id)->get();
        return view('./author/author-articles')->with([
            'userArticles' => $userArticles,
            'categories' => $categories,
            'user' => $user
        ]);
    }

    public function createNewArticles(){
        return view('./author/create-new-article');
    }
}