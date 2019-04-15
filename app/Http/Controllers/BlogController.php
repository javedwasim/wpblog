<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    protected $limit = 10;
    public function index(){
        $posts  = Post::with('author')
                    ->latestFirst()
                    ->published()
                    ->simplePaginate($this->limit);
        return view('blog.index',compact('posts'));
    }

    public function show(Post $post){
        //$post = Post::published()->findOrfail($id);
        return view('blog.show',compact('post'));
    }
}
