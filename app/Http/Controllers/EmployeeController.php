<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Wallet;
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
        $employee = Employee::create([
            'name' => $request->name,
            'role' => $request->role,
            'location' => $request->location,
            'salary' => $request->salary,
        ]);
        // dd($employee);
        Wallet::create(['employee_id' => $employee->id]);
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
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return to_route('index')->with('message', 'Employee Succesfully Updated');
    }
    public function show_wallet($id)
    {
        $wallet = Wallet::where('employee_id', $id)->first();
       // dd($wallet->id);
        return view('employee.wallet', compact('wallet'));
    }
    public function activate(Wallet $id)
    {
        $id->forceFill([
            'wallet_status' =>'1',  
        ])->save();
        return back()->with('message', 'Wallet successfully activated');
    }
    public function create_show()
    {
        return view('employee.credit');
    }

}
