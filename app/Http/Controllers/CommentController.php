<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

    public function block(Comment $comment)
    {
        $comment->blocked = true;
        $comment->save();
        return redirect()->back();
    }

    public function unblock(Comment $comment)
    {
        $comment->blocked = false;
        $comment->save();
        return redirect()->back();
    }
}

