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
    protected function createWallet($employee)
    {
        Wallet::create(['employee_id' => $employee->id]);
    }
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
        $this->createWallet($employee);
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

        return view('employee.wallet', compact(['wallet']));
    }
    public function activate(Wallet $id)
    {
        $id->update([
            'wallet_status' => '1',

        ]);

        return back()->with('message', 'Wallet successfully activated');
    }
    public function credit_show($id)
    {
        $employee = Wallet::where('employee_id', $id)->first();
        return ($employee->wallet_status == 1) ? view('employee.credit', compact('id')) : back()->with('error', 'Wallet Not Yet Activated');
    }
    public function credit(Request $request, $id)
    {
        $employee = Wallet::where('employee_id', $id)->first();

        $request->validate([
            'amount' => ['required', 'numeric'],
        ]);

        $employee->update([
            'balance' => $employee->balance + $request->amount,
            'last_credited' => now(),
        ]);

        return to_route('index')->with('message', 'Employee Succesfully Credited');
    }
}
