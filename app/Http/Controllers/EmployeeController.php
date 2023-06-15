<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Wallet;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;

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
        $wallet_date = Carbon::parse($wallet->last_credited)->format('d-m-Y');
        $wallet_time = Carbon::parse($wallet->last_credited)->toTimeString();
        
      
        return view('employee.wallet', compact(['wallet','wallet_date','wallet_time']));
    }
    public function activate(Wallet $id)
    {
        $id->forceFill([
            'wallet_status' => '1',
        ])->save();
        return back()->with('message', 'Wallet successfully activated');
    }
    public function credit_show($id)
    {
        $employee = Wallet::where('employee_id', $id)->first();

        if ($employee->wallet_status == 1) {
            return view('employee.credit', compact('id'));
        } else {
            return back()->with('error', 'Wallet Not Yet Activated');
        }
    }
    public function credit(Request $request, $id)
    {
        $employee = Wallet::where('employee_id', $id)->first();

        $request->validate([
            'amount' => ['required', 'numeric'],
        ]);

        $employee->forceFill([
            'balance' => $employee->balance + $request->amount,
            'last_credited' => now(),
        ])->save();

        return to_route('index')->with('message', 'Employee Succesfully Credited');
    }
}
