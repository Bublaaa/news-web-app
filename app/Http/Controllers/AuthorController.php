<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Preference;
use App\Models\Article;
use App\Models\Article_Request;
use App\Models\Article_Version;

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
        return view('./author/author-new-article');
    }

    public function showPublishRequest() {
        $userDrafts = Article::where('status','draft')->get();
        return view('./author/author-publish-request')->with([
            'userDrafts' => $userDrafts,
        ]);
    }
    
    public function showAccountDetails(){
        $userDetail = Auth::user();
        $publishedCount = Article::where('user_id', $userDetail->id)
            ->where('status', 'published')
            ->count();
        return view('./author/author-account-setting')->with([
            'userDetail' => $userDetail,
            'publishedCount' => $publishedCount
        ]);
    }

    public function showArticleDetails(String $id) {
        $latestVersion = Article_Version::where('article_id', $id)
            ->orderBy('version_number', 'desc')
            ->first();
        $versionControl = Article_Version::where('article_id',$id)
            ->orderBy('version_number', 'desc')
            ->get();
        $userDetail = Auth::user();
        $articleDetail = Article::findOrFail($id);
        return view('author.author-article-detail') -> with([
            'articleDetail' => $articleDetail,
            'userDetail' => $userDetail,
            'latestVersion' => $latestVersion,
            'versionControl' => $versionControl,
        ]);
    }
}