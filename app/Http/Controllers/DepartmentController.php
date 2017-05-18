<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;


class DepartmentController extends Controller
{
    public function showDepartments()
    {
        $departments = Department::all();
        return view('request.details_Request',compact('departments'));
    }
}

