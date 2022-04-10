@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="row text-center"><a href="{{route('posts.create')}}" class="btn btn-outline-warning text-dark fw-bolder">Create New Post</a></div>
        @foreach($posts as $post)
        <div class="card m-3" style="width: 18rem;">
            @if(auth()->user()->role =='admin')
                <span><i class="bi bi-person"></i> <bold>{{$post->user->name}}</bold></span>
            @endif
            @if($post->image)
            <img src="{{url('Images/'.$post->image)}}" class="card-img-top" alt="" style="height: 200px">
            @endif
            <div class="card-body">
                <p class="card-text">{{Str::limit($post->body, 50)}}</p>
                @if($post->user->id == auth()->user()->id)
                <a href="{{route('posts.show',$post->id)}}" class="btn btn-secondary">Edit</a>
                <a href="{{route('posts.delete',$post->id)}}" class="btn btn-danger">Delete</a>
                @endif
            </div>
            <div>
                <i class="bi bi-calendar"></i> <span>{{Carbon\Carbon::parse($post->created_at)->format('M d Y')}}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
