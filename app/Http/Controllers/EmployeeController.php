<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    //

    public function home()
    {
        return view('home.home');
    }
    public function employee_page()
    {
        return view('employees.index');
    }
    public function profile()
    {
        return view('Employees.profile');
    }
    public function update_details(Request $request, User $id)
    {
        
        $form = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($id->id)],
        ]);
        $id->update($form);

        return back()->with('message', 'Successfully updated');
    }
    public function password_update(Request $request, User $user)
    {
      
        $request->validate([
            'password' => ['required', 'min:6','confirmed'],
            'current_password' => ['required',],
        ]);
    
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'The provided password does not match your current password.');
        } 
        $user->update([
        'password' => bcrypt($request->password)]); 
        return back()->with('message', 'successfully updated');
        }
    }

