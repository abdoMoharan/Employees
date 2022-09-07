<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;

class EmployeeController extends Controller
{

    public function index(Request $request)
    {
    $employees = Employee::all();
    $departments = Department::all();
        if($request->has('search')){
            $employees = Employee::where('first_name','like',"%{$request->search}%")->orWhere('last_name','like',"%{$request->search}%")->get();
        }
    return view('employees.index',compact('employees', 'departments'));
    }


    public function create()
    {
        $data['departments'] = Department::all();
        $data['countres'] = Country::all();
        $data['states'] = State::all();
        $data['cities'] = City::all();

        return view('employees.create',$data);
    }


    public function store(EmployeeStoreRequest $request)
    {
        Employee::create($request->validated());

        return redirect()->route('employees.index')->with('message', 'Employee Creared Succesfully');
    }


    public function show($id)
    {
        //
    }


    public function edit(Employee $employee)
    {
        $data['departments'] = Department::all();
        $data['countres'] = Country::all();
        $data['states'] = State::all();
        $data['cities'] = City::all();
        return view('employees.edit',compact('employee'),$data);
    }


    public function update(EmployeeStoreRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->route('employees.index')->with('message', 'Employee Updated Succesfully');

    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('message', 'Employee Deleted Succesfully');

    }
}
