<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Http\Services\PostService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $postService;
    public function __construct(PostService $postService)
    {
        $this->middleware('auth');
        $this->postService=$postService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $posts= PostResource::collection($this->postService->index());
        return view('home',compact('posts'));
    }
}
