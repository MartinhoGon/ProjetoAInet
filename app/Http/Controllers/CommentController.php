<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
<<<<<<< Updated upstream
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
=======
    
}



comment
user_id
request_id
created_at
updated_at
blocked
parent_id
>>>>>>> Stashed changes
