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

    public function destroy(Request $requests)
    {
        $this->authorize('delete', $requests);

        $requests->delete();

        return redirect()
            ->route('requests.showRequests')
            ->with('success', 'Request deleted successfully');
    }

    public function create()
    {
        $this->authorize('create', Request::class);
        $requests = new Request();
        return view('requests.add', compact('requests'));
    }

    public function store(StoreUserRequest $requests)
    {
        $this->authorize('create', Request::class);
        $requests = new Request;
        $requests->fill($requests->all());
        $requests->save();

        return redirect()
            ->route('requests.showRequests')
            ->with('success', 'Request added successfully');
    }



}
