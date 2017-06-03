<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Request as Pedido;
use App\Comment;

use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{
    public function usersBlock()
    {
        $users = User::where('blocked', '1')->paginate(20);
        return view('administracao.listarUsers', compact('users'));
    }

    public function usersUnblock()
    {
        $users = User::where('blocked', '0')->paginate(20);
        return view('administracao.listarUsers', compact('users'));
    }

    public function pedidos()
    {
        $requests = Pedido::paginate(20);
        return view('administracao.listarPedidos', compact('requests'));
    }

    public function commentsBlock()
    {
        $comments = Comment::where('blocked', '1')->paginate(20);
        return view('administracao.listarComentarios', compact('comments'));
    }

    public function commentsUnblock()
    {
        $comments = Comment::where('blocked', '0')->paginate(20);
        return view('administracao.listarComentarios', compact('comments'));
    }
}
