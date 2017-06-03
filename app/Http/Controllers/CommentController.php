<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment as Comentario;

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

        public function concluirComentario(Comentario $comment, Comment $com, Request $req)
    {
        $comment->blocked=false;
        $comment->created_at=Carbon::now();
        $comment->updated_at=Carbon::now();
        $comment->comment=$com->comment;
        $comment->request_id=req->id;
        $comment->parent_id=1;
        $comment->user_id=$req->owner_id;

        return redirect()->route('requests.showRequest', $req);
    }



}
    


