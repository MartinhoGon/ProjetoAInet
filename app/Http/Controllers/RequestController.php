<?php

namespace App\Http\Controllers;

use App\Request as Pedido;
use Illuminate\Http\Request;


class RequestController extends Controller
{
    public function showRequests()
    {
    	$requests = Pedido::all()->take(5);
    	return view('showPedidos',compact('requests'));
    }
}
