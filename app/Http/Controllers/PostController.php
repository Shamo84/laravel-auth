<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
  private $validationRules;

  public function __construct()
  {
    $this->validationRules = [
      "name" => "required|string|max:60",
      "email" => "required|email|max:60",
      "text" => "required|string|max:255"
    ];
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::user()) {
        return redirect()->route("admin.posts.index");
      }
      $posts = Post::all();
      $tags = Tag::all();
      $data = [
        "posts" => $posts,
        "tags" => $tags
      ];
      return view("guest.posts.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate($this->validationRules);
      $data = $request->all();
      $newComment = new Comment;
      $newComment->fill($data);
      $saved = $newComment->save();

      if (!$saved) {
        abort("404");
      }
      Mail::to('mail@mail.it')->send(new SendNewMail($newComment));
      $post = Post::where("id", $data["post_id"])->first();
      $slug = $post->slug;
      // return redirect()->route("posts.show", $slug);
      return redirect()->back();

      // $newComment = new Comment;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $post = Post::where("slug", $slug)->first();
      $comments = Comment::where("post_id", $post->id)->get();

      $data = [
        "post" => $post,
        "comments" => $comments
      ];

      return view("guest.posts.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
