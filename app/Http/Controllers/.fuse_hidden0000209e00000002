<?php

namespace App\Http\Controllers;

use App\Request as Pedido;
use Illuminate\Http\Request;
use App\Department;
use App\User;
use App\Printer;
use App\Comment;
use App\Policies\RequestPolicy;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use Auth;
use Storage;

class RequestController extends Controller
{
    protected $fillable = ['description','quantity'];

    public function showRequests(User $user)
    {
        if ($user->isAdmin()) {
            $requests = Pedido::paginate(20);
        } else {
            $requests = Pedido::where("owner_id", $user->id)->paginate(20);
        }
        $departments = Department::all();
        

        return view('request.resquestList', compact('requests', 'departments'));
    }


    public function showRequest(Pedido $request, User $user)
    {
        $comments= Comment::where("request_id", $request->id);
        //dd($comments);
        $printers = Printer::all();
        return view('request.details_Request', compact('request', 'printers', 'comments'));
    }

    public function edit(Pedido $request)
    {
        $this->authorize('update', $request);
        $departments = Department::all();
        return view('request.edit_Request', compact('request', 'departments'));
    }


    public function update(UpdatePedidoRequest $req, Pedido $request)
    {
        //$this->authorize('update', $req);
        $request->fill($req->all());
        $name = Self::saveFile($request, $req);
        $request->file = $name;
        $request->file;
        $request->status = 0;
        $request->owner_id = Auth::user()->id;
        $request->save();
        return redirect()
            ->route('requests.showRequests', Auth::user())
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
        $name = Self::saveFile($request, $requests);
        $request->file = $name;
        $request->save();
        return redirect()
            ->route('requests.showRequests', Auth::user())
            ->with('success', 'Request added successfully');
    }

    public function saveFile($request, $requests)
    {
        $name = $request->owner_id."-".time().".".$requests->file->getClientOriginalExtension();
        $filepath = 'print-jobs'.DIRECTORY_SEPARATOR."$request->owner_id";

        $requests->file->storeAs($filepath, $name, 'local');
        return $name;
    }

    public function downloadFile(Pedido $request)
    {
        $filename = $request->file;
        return response()->download(storage_path('app/print-jobs/'.$request->owner_id.'/'.$filename));
    }
    
    public function destroy(Request $request)
    {
        $this->authorize('delete', $request);

        $request->delete();

        return redirect()
            ->route('requests.showRequests')
            ->with('success', 'Request deleted successfully');
    }

    public function orderName()
    {
        $requests = Pedido::orderBy('name', 'asc')->paginate(20);
        $departments = Department::all();
        return view('request.resquestList', compact('departments', 'requests'));
    }

    public function orderDepartment()
    {
        $requests = Pedido::orderBy('department_id', 'asc')->paginate(20);
        $departments = Department::all();
        return view('request.resquestList', compact('departments', 'requests'));
    }

    public function groupDepartment(Department $departments)
    {
        dd($departments->id);
        $users = User::where("department_id", $departments->id)->paginate(20);
        $departments = Department::all();
        return view('request.resquestList', compact('users', 'departments', 'requests'));
    }

    public function concluirPedido(Pedido $request, Request $req)
    {
        $request->status = 1;
        $request->printer_id = $req->printer_id;
        $request->save();
        return redirect()->route('requests.showRequest', $request);
    }

    public function recusarPedido(Pedido $request, Request $req)
    {
        $request->status = 2;
        $request->refused_reason = $req->refused_reason;
        $request->save();
        return redirect()->route('requests.showRequest', $request);
    }

    public function concluirAvaliacao(Pedido $request, Request $req)
    {
        $request->satisfaction_grade = $req->satisfaction_grade;
        $request->save();
        return redirect()->route('requests.showRequest', $request);
    }
}
