<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Article_Version;
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
        // request validation
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        // image url handler
        $imageUrl = null;
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $imagePath = $image->store('public/images/article');
            $imageUrl = Storage::url($imagePath);
        }

        $newArticle = Article::create([
            'user_id' => Auth::id(),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'status' => 'draft',
            'image_url' => $imageUrl,
            'views_count' => 0
        ]);
        // $article = new Article();
        // $article->user_id = Auth::id();
        // $article->title = $request->input('title');
        // $article->content = $request->input('content');
        // $article->status = 'draft';
        // $article->image_url = $imageUrl;
        // $article->views_count = 0;

        // $article->save();
        if($newArticle){
            return redirect()->back()->with('success', 'Article created successfully.');
        }
        else {
             return redirect()->back()->with('error', 'Failed to create article.');
        }
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
    public function destroy(Article $article, Request $request)
    {
        // check articleId
        // dd($article->id == $request->confirm_id);
        if($article->id == $request->confirm_id){
            if ($article->image_url) {
                $imageUrl = str_replace('/storage', 'public', $article->image_url);
                // Delete the image from the storage
                if ($imageUrl && Storage::exists($imageUrl)) {
                    Storage::delete($imageUrl);
                }
            }
            // Delete the article from the database
            $article->delete();
            return redirect()->route('author.articles')->with('success', 'Article and associated image deleted successfully.');
        }
        else {
            return redirect()->route('author.articles')->with('error', 'Confirmation ID is not match.');
        }
    }
}