<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        // Validate request input
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);
        $user = User::findOrFail($id);

        $imageUrl = null;
        $imageUrl = $user->image_url; // Get current image URL from the user record

        // Check if a new image is uploaded
        if ($request->hasFile('user_image')) {
            // Delete the existing image if it exists
            if ($imageUrl && Storage::exists($imageUrl)) {
                Storage::delete($imageUrl);
            }

            // Store the new image and update the URL
            $image = $request->file('user_image');
            $imagePath = $image->store('public/images/profile');
            $imageUrl = Storage::url($imagePath);
        }

        // Update the user record
        $user->update([
            'name' => $request->input('fullname'),
            'email' => $request->input('email'),
            'image_url' => $imageUrl // Update image URL if it was changed
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}