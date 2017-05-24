<?php

namespace App\Http\Controllers;

use App\Requests;
use Illuminate\Http\Request;
use App\Department;


class RequestController extends Controller
{
    public function showRequests()
    {
    	$requests = Requests::paginate(10);
    	$departments = Department::all();
    	return view('request.resquestList',compact('requests', 'departments'));
    }

    public function edit(Request $requests)
    {
        $this->authorize('update', $requests);
        return view('requests.add-edit_Request', compact('requests'));
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
        return view('requests.add-edit_Request', compact('requests'));
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
