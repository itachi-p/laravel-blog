<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
}
