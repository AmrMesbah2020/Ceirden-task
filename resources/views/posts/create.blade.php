@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="row">
                <p class="text-center">Take Care what you Post </p>
            </div>
            <form method="POST" action="{{route(('posts.store'))}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <textarea name="body" placeholder="Type Here ....." class="form-control" aria-label="With textarea"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">upload Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>

                <button type="submit" class="btn btn-primary">Publish</button>
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
