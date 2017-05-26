<?php

namespace App\Http\Controllers;

use App\Request as Pedido; 
use Illuminate\Http\Request;
use App\Department;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;


class RequestController extends Controller
{
    public function showRequests()
    {
    	$requests = Pedido::paginate(20);
    	$departments = Department::all();
    	return view('request.resquestList',compact('requests', 'departments'));
    }

    public function edit(Pedido $requests)
    {
        $this->authorize('update', $requests);
        return view('requests.add-edit_Request', compact('requests'));
    }

    public function update(Pedido $requests)
    {
        $this->authorize('update', $requests);
       
        $requests->save();

        return redirect()
            ->route('requests.showRequests')
            ->with('success', 'Request saved successfully');
    }

    public function destroy(Pedido $requests)
    {
        $this->authorize('delete', $requests);

        $requests->delete();

        return redirect()
            ->route('requests.showRequests')
            ->with('success', 'Request deleted successfully');
    }

    public function create()
    {
        //$this->authorize('create', Pedido::class);
        $requests = new Pedido();
        return view('request.add-edit_Request', compact('requests'));
        //dd("create");
    }

    public function store(StoreUserRequest $requests)
    {
        $this->authorize('create', Pedido::class);
        $requests = new Pedido;
        $requests->fill($requests->all());
        $requests->save();

        return redirect()
            ->route('requests.showRequests')
            ->with('success', 'Request added successfully');
    }



}
