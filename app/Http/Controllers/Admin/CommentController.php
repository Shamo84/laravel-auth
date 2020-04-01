<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function destroy(Comment $comment)
  {
    $comment->delete();
    return redirect()->route("admin.posts.show", $slug);
  }
}
