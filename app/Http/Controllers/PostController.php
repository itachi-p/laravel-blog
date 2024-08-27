<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    #
    public function index()
    {
        return view('posts.index');
    }


    # create() view the Create Post page
    public function create()
    {
        return view('posts.create');
    }


    # store() save the post to database
    public function store(Request $request)
    {
        # 1. Validate the request
        $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:1000',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1048',
        ]);
        // mime = multipurpose internet mail extensions

        # 2. Save the form data to the DB
        $this->post->user_id = Auth::user()->id;
        $this->post->title = $request->title;
        $this->post->body = $request->body;
        $this->post->image = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));
        $this->post->save();

        # 3. Back to Homepage
        return redirect()->route('index');
    }
}
