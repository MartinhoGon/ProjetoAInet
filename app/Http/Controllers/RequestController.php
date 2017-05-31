<?php

namespace App\Http\Controllers;

use App\Request as Pedido; 
use Illuminate\Http\Request;
use App\Department;
use App\User;
use App\Printer;
use App\Policies\RequestPolicy;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;


class RequestController extends Controller
{

    protected $fillable = ['description','quantity'];

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
        $printers = Printer::all();
        return view('request.details_Request',compact('request', 'printers'));
    }

    public function edit(Pedido $request)
    {

        $this->authorize('update', $request);
        $departments = Department::all();
        return view('request.edit_Request', compact('request', 'departments'));
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

    public function destroy(Pedido $request)
    {
        $this->authorize('delete', $request);

        $request->delete();

        return redirect()
            ->route('requests.showRequests')
            ->with('success', 'Request deleted successfully');
    }

    public function create()
    {
        $this->authorize('create', Pedido::class);
        $request = new Pedido();
        return view('request.add_Request', compact('request'));
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

    public function block(User $id)
    {
        $user = User::findOrFail($id)->first();
        $user->blocked = true;
        $user->save();
        return redirect()->back();
    }

    public function unblock(User $id)
    {
        $user = User::findOrFail($id)->first();
        $user->blocked = false;
        $user->save();
        return redirect()->back();
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
