@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <form class="" action="{{route("admin.posts.store")}}" method="post" enctype="multipart/form-data">
          @method("POST")
          @csrf
          <div class="form-group">
            <label for="title">TITLE</label>
            <input class="form-control" type="text" name="title" value="" placeholder="">
            <label for="content">TEXT</label>
            <textarea class="form-control mb-4" name="content" rows="8" cols="80"></textarea>
            <div class="btn btn-warning">
              @foreach ($tags as $tag)
                <input class="ml-2" type="checkbox" name="tags[]" value="{{$tag->id}}">
                <label for="">{{$tag->name}}</label>
              @endforeach

            </div>
          </div>
          <input type="file" name="image_path" accept="image/*">
          <button class="mt-4 form-control btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection
