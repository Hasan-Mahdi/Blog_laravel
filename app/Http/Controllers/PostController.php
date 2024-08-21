<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = ['posts' => Post::all()];

        // return view('posts.index', $data);

        return view('posts.index')->with('posts', Post::orderBy('id','Desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "image_path" => "required|mimes:png,jpg,gif,jpeg|max:5000"
        ]);

    $image = $request->file("image_path");
    $image_name = uniqid().".".$image->extension();
    $image->move(public_path("images"), $image_name);

    // dd($image_name);

    $post = new Post();

    $post->title = $request->title;
    $post->slug = str_replace(" ","-",$request->title);
    $post->description = $request->description;
    $post->image_path = $image_name;
    $post->user_id = auth()->user()->id;

    $post->save();

    return redirect()->route("posts.index")->with("message", "Inserted");

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("posts.show", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("posts.edit", compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title" => "required",
            "image_path" => "nullable|mimes:png,jpg,gif,jpeg|max:5000"
        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image_path')) {
            // Delete the old image if it exists
            if (file_exists(public_path('images') . '/' . $post->image_path)) {
                unlink(public_path('images') . '/' . $post->image_path);
            }

            $image = $request->file('image_path');
            $image_name = uniqid() . '.' . $image->extension();
            $image->move(public_path('images'), $image_name);

            // Update the image_path with the new image
            $post->image_path = $image_name;
        }

        // Update the post attributes
        $post->title = $request->title;
        $post->slug = str_replace(" ", "-", $request->title);
        $post->description = $request->description;

        // Save the updated post
        $post->save();

        // Redirect with success message
        return redirect()->route('posts.index')->with('message', 'Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {


        $post->delete();
        return redirect()->route('posts.index')->with('message', 'Deleted');

    }
}
