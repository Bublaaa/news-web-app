<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class AdminController extends Controller
{
    public function index(){
        return view('./layouts/admin-dashboard');
    }
    public function showPublishRequests(){
        return view('publish-request');
    }
    public function showUsers(){
        return view('users');
    }
    public function showArticles(){
        $availableCategories = Category::all();
        return view('./article/articles')->with('availableCategories', $availableCategories);
    }
    
}