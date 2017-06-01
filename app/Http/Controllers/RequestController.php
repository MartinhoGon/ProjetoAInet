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
use Auth;


class RequestController extends Controller
{

    protected $fillable = ['description','quantity'];

    public function showRequests(User $user)
    {  
        if ($user->isAdmin()) {
            $requests = Pedido::paginate(20);
        } else {
            $requests = Pedido::where("owner_id",$user->id)->paginate(20);
        }      
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
        $this->authorize('update', $request);
       
        
        $requestss->fill($requests->all());
        $requestss->save();
        return redirect()
            ->route('requests.showRequests')
            ->with('success', 'Request saved successfully');
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
        $request = new Pedido;
        $request->owner_id = Auth::user()->id;
        $request->status = 0;
        $request->fill($requests->all());
        $request->file = " ";
        $request->save();
        return redirect()
            ->route('requests.showRequests', Auth::user())
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


    public function concluirPedido(Pedido $request, Request $req)
    {
        $request->status = 1;
        $request->printer_id = $req->printer_id;
        $request->save();
        return redirect()->route('requests.showRequest',$request);
    }

    public function recusarPedido(Pedido $request, Request $req)
    {
        $request->status = 2;
        $request->refused_reason = $req->refused_reason;
        $request->save();
        return redirect()->route('requests.showRequest' , $request);
    }

}
