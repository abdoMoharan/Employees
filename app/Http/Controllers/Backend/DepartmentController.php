<?php

namespace App\Http\Controllers\Backend;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentStoreRequest;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::all();

        if($request->has('search')){
            $departments = Department::where('name','like',"%{$request->search}%")->get();
        }

        return view('department.index',compact('departments'));
    }


    public function create()
    {
        return view('department.create');
    }


    public function store(DepartmentStoreRequest $request)
    {
        Department::create($request->validated());
        return redirect()->route('departments.index')->with('message', 'Department Creared Succesfully');
    }


    public function show($id)
    {
        //
    }

    public function edit(Department $department)
    {
        return view('department.edit',compact('department'));
    }

    public function update(DepartmentStoreRequest $request, Department $department)
    {
        $department->update($request->validated());

        return redirect()->route('departments.index')->with('message', 'Department Upadted Succesfully');

    }


    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('message', 'Department Deleted Succesfully');

    }
}
