<?php

namespace App\Http\Services;



use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class PostService {

    public function index(){
        if(auth()->user()->role =='admin'){
            $posts=Post::with('user')->get();
            return $posts;
        }else{
            $posts=Post::with('user')->where('user_id',auth()->user()->id)->get();
            return $posts;
        }

    }

    public function create($request)
    {
        if($request->file('image'))
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            Post::create([
                'user_id'=>auth()->user()->id,
                'body'=>$request->input('body'),
                'image'=>$imageName
            ]);
        }else{
            Post::create($request->validated());
        }

    }

    public function show($postId){
       return Post::find($postId);
    }

    public function delete($postId){
        Post::destroy($postId);
    }

    Public function update($request,$postId)
    {
        if($imageName=$request->file('image'))
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        Post::find($postId)->update([
            'body'=>$request->input('body'),
            'image'=>$imageName
        ]);
    }

}
