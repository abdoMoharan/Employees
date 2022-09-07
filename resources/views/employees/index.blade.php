@extends('layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Employees</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="GET" action="{{ route('employees.index') }}">
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <input type="search" name="search" class="form-control mb-2"
                                            id="inlineFormInput" placeholder="search">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('employees.create') }}" class="btn btn-primary mb-2 float-right">Create
                                Employees</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th scope="col">#Id</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Department</th>
                                <th scope="col">Manage</th>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee )
                                <tr>
                                    <th>{{ $employee->id }}</th>
                                    <th>{{ $employee->first_name }}</th>
                                    <th>{{ $employee->last_name }}</th>
                                    <th>{{ $employee->address }}</th>
                                    <th>{{ $employee->department->name }}</th>
                                    <th>
                                        <a href="{{ route('employees.edit',$employee->id) }}"
                                            class="btn btn-success">Edit</a>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
