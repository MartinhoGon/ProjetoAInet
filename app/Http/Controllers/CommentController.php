<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Request as Pedido;

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

        public function concluirComentario(Comment $comment, Request $req, Pedido $request)
    {
        $comment->blocked=false;
        $comment->created_at=Carbon::now();
        $comment->updated_at=Carbon::now();
        $comment->comment=$comment->comment;
        $comment->request_id=$req->id;
        $comment->parent_id=1;
        $comment->user_id=$req->owner_id;
        $comment->save();

        return redirect()->route('requests.showRequest', $comment, $request);
    }



}


