<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        $employees = Employee::paginate(20);
        return view('employee.index', compact('employees'));
    }
    public function show()
    {
        return view('employee.create');
    }
    public function create(EmployeeRequest $request)
    {
        // dd($request);
        Employee::create([
            'name' => $request->name,
            'role' => $request->role,
            'location' => $request->location,
            'salary' => $request->salary,
        ]);
        return to_route('index')->with('message', 'Employee Succesfully Created');
    }
    public function destroy(Employee $id)
    {
        $id->delete();

        return back()->with('message', 'Deleted successfully');
    }
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }
    public function update(EmployeeRequest $request,Employee $employee)
    {
        $employee->update($request->validated());
        return to_route('index')->with('message', 'Employee Succesfully Updated');

    }
}
