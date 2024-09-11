<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article_Request;
use App\Models\Article;
use App\Models\User;

class ArticleRequestController extends Controller
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'article_id' => 'required|string|max:255',
        ]);
        $articleRequest = Article_Request::where('article_id',$request->article_id)->first();
        // Check if request is aleardy made
        if(!$articleRequest){
            $adminIds = User::where('role', 'admin')->pluck('id')->toArray();
            if (!empty($adminIds)) {
                $randomAdminId = $adminIds[array_rand($adminIds)];
                // Create enw publish request
                $newArticleRequest = Article_Request::create([
                    'article_id' => $request->article_id,
                    'user_id' => $randomAdminId,
                    'request_type' => 'publish',
                    'request_status' => 'new',
                ]);
                if($newArticleRequest){
                    // Update article Status to Review
                    $article = Article::findOrFail($request->article_id);
                    $article->update([
                        'status' => 'being reviewed',
                    ]);
                    return redirect()->back()->with('success','Success send publish request');
                }
                else {
                    return redirect()->back()->with('error','Failed to send publish request');
                }
            }
            else {
                return redirect()->back()->with('error', 'No admin found');
            }
        } else {
            return redirect()->back()->with('error', 'Request is already made');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article_Request $article_Request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article_Request $article_Request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article_Request $article_Request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article_Request $article_Request)
    {
        //
    }
}