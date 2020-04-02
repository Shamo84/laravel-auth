<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function destroy(Comment $comment)
  {
    $comment->delete();
    return redirect()->back();
  }
}
