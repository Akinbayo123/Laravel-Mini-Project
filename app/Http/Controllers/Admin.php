<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller
{
    //
    protected function createWallet($employee)
    {
        Wallet::create(['employee_id' => $employee->id]);
    }
    public function index()
    {
        $employees = User::paginate(20);
        $wallet = Wallet::where("employee_id", auth()->user()->id)->first();

        //return view('admin.wallet', compact(['wallet']));
        return (Auth::user()->user_type == 1) ? view('admin.index', compact('employees', 'wallet')) : view('Employees.index', compact('wallet'));
    }
    public function show()
    {
        return view('admin.create');
    }

    public function create(EmployeeRequest $request)
    {

        $employee = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'location' => $request->location,
            'salary' => $request->salary,
        ]);
        // dd($employee);
        $this->createWallet($employee);
        return to_route('index')->with('message', 'Employee Succesfully Created');
    }
    public function destroy(User $id)
    {
        $id->delete();

        return back()->with('message', 'Succesfully Deleted');
    }
    public function edit(User $employee)
    {
        return view('admin.edit', compact('employee'));
    }
    public function update(Request $request, User $employee)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($employee->id)],
            'role' => ['required'],
            'user_type' => ['required','numeric'],
            'location' => ['required'],
            'salary' => ['required', 'integer'],
        ]);
        if ($request->password != "") {
            $formFields = $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);
            $formFields['password'] = bcrypt($request->password);
        }
        $employee->update($formFields);
        return to_route('index')->with('message', 'Employee Succesfully Updated');
    }
    public function show_wallet($id)
    {
        $wallet = Wallet::where(auth()->user()->id, $id)->first();

        return view('admin.wallet', compact(['wallet']));
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
        return ($employee->wallet_status == 1) ? view('admin.credit', compact('id')) : back()->with('error', 'Wallet Not Yet Activated');
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
