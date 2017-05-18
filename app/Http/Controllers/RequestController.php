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

    public function edit(Request $requests)
    {
        $this->authorize('update', $requests);
        return view('requests.edit', compact('requests'));
    }

    public function update(Request $requests)
    {
        $this->authorize('update', $requests);
       
        $requests->save();

        return redirect()
            ->route('requests.showRequests')
            ->with('success', 'Request saved successfully');
    }



}
