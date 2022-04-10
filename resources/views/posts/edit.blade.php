@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <form method="POST" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <textarea name="body" class="form-control" aria-label="With textarea">{{$post->body}}</textarea>
                </div>
                @if($post->image)
                <div class="mb-3 text-center">
                    <img src="{{url('images/'.$post->image)}}" alt="" style="height: 400px;width: 500px">
                </div>
                @endif
                <div class="mb-3">
                    <label for="image" class="form-label">replace the Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger m-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

    </div>
@endsection
