<?php

namespace App\Http\Controllers;

use App\Request as Pedido; 
use Illuminate\Http\Request;
use App\Department;
use App\User;
use App\Policies\RequestPolicy;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;


class RequestController extends Controller
{
    public function showRequests(User $authUser)
    {   
        //dd($authUser->id);
        // if ($authUser->admin == 1) {
        //     $requests = Pedido::paginate(20);
        // }else {
        //     $requests = Pedido::where('owner_id', 'authUser->id')->first();    
        // }
        $requests = Pedido::paginate(20);
        $departments = Department::all();

    	return view('request.resquestList',compact('requests', 'departments'));
    }

    public function showRequest(Pedido $request)
    {
        return view('request.details_Request', compact('request'));
    }

    public function edit(Pedido $requests)
    {

        $this->authorize('update', $requests);
        $departments = Department::all();
        return view('request.edit_Request', compact('requests', 'departments'));
    }


    public function update(UpdatePedidoRequest $requests, Request $request)
    {
        $this->authorize('update', $requests);
       
        
        $requests->fill($requests->all());
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
        $this->authorize('create', Pedido::class);
        $requests = new Pedido();
        return view('request.add_Request', compact('requests'));
    }

    public function store(StorePedidoRequest $requests)
    {
        $this->authorize('create', Pedido::class);
        $requests = new Pedido;
        $requests->fill($requests->all());
        $requests->save();

        return redirect()
            ->route('requests.showRequests')
            ->with('success', 'Request added successfully');
    }

    public function orderName()
    {
        $requests = Pedido::orderBy('owner_id->name', 'asc')->paginate(20);
        $departments = Department::all();
        return view('request.resquestList',compact('departments', 'requests'));
    }

    public function orderDepartment()
    {
        $requests = Pedido::orderBy('owner_id->department_id', 'asc')->paginate(20);
        $departments = Department::all();
        return view('request.resquestList',compact('user', 'departments', 'requests'));

    }

    public function groupDepartment()
    {
        $users = User::groupBy('department_id')->paginate(20);
        $departments = Department::all();
        return view('request.resquestList',compact('users', 'departments'));
    }

    public function concluirPedido(Pedido $request)
    {
        $request->status = 1;
        $request->save();
        return redirect()->route('requests.showRequest',$request);
    }

    public function recusarPedido(Pedido $request)
    {
        $request->status = 2;
        $request->save();
        return redirect()->route('requests.showRequest' , $request);
    }



}
