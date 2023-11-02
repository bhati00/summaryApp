<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('add-blog-post-form');
    }
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Generate a unique name for the file
            $newname = 'newname.' . $file->getClientOriginalExtension();

            // Store the file in the 'public' disk within the 'uploads' directory
            $path = $file->storeAs('/', $newname, 'public');
            echo $path;
            return redirect('add-blog-post-form')->with('status', 'Blog Post Form Data Has Been inserted');
        } else {
            // Handle the case where no file was uploaded
            return redirect('add-blog-post-form')->with('error', 'No file was uploaded.');
        }
    }
}
