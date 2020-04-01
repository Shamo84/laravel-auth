@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="post mb-4">
          <h2>{{$post->title}}</h2>
          <p>{{$post->content}}</p>
          @foreach ($post->tags as $tag)
            <span class="badge badge-warning">{{$tag->name}} </span>
          @endforeach
          <div class="row">
            <div class="col-10 mx-auto">
              <form class="mt-5" action="{{route("posts.store")}}" method="post">
                @csrf
                @method("POST")
                <h3>Enter a comment</h3>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="your name">
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" name="email" placeholder="email@example.com">
                </div>
                <div class="form-group">
                  <label for="text">Text</label>
                  <textarea class="form-control" name="text" rows="3"></textarea>
                </div>
                <input class="btn btn-primary" type="submit" value="SEND">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
