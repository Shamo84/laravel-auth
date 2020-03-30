@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        @foreach ($posts as $post)
          <div class="post">
            <h2>{{$post->title}}</h2>
            <p>{{$post->content}}</p>
          </div>
        @endforeach

      </div>
    </div>
  </div>
@endsection
