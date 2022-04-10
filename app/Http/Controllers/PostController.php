<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Services\PostService;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    public $postService;
    public function __construct(PostService $postService)
    {
        $this->postService=$postService;
    }

    public function apiIndex(){
        $posts= PostResource::collection($this->postService->index());
        return response()->json(PostResource::collection($posts),200);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(PostRequest $request){
        $this->postService->create($request);
        return redirect('/home');
    }

    public function show($postId){
        $post = new PostResource($this->postService->show($postId));
        return view('posts.edit',compact('post'));
    }

    public function delete($postId)
    {
        $this->postService->delete($postId);
        return back();
    }

    public function update(PostRequest $request,$postId)
    {
        $this->postService->update($request,$postId);
        return redirect('/home');
    }
}
