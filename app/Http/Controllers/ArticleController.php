<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $imageUrl = null;
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $imagePath = $image->store('public/images');
            $imageUrl = Storage::url($imagePath);
        }

        $article = new Article();
        $article->user_id = Auth::id();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->status = 'draft';
        $article->image_url = $imageUrl;
        $article->views_count = 0;

        $article->save();

        return redirect()->back()->with('success', 'Article created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}