<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::paginate(10);
        return view('admins.user.index', compact('users'));
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('admins.user.update', compact('users'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'email' => 'required|email',
        'name' => 'required|string',
        'usertype' => 'required|string',
        'password' => 'nullable|string|min:8',
    ], [
        'email.required' => 'Field email harus diisi.',
        'email.email' => 'Field email harus berupa alamat email yang valid.',
        'name.required' => 'Field name harus diisi.',
        'name.string' => 'Field name harus berupa string.',
        'usertype.required' => 'Field usertype harus diisi.',
        'usertype.string' => 'Field usertype harus berupa string.',
        'password.string' => 'Field password harus berupa string.',
        'password.min' => 'Field password harus memiliki minimal 8 karakter.',
    ]);

    $users = User::findOrFail($id);

    $users->name = $request->name;
    $users->email = $request->email;
    $users->usertype = $request->usertype;

    if ($request->filled('password')) {
        $users->password = Hash::make($request->password);
    }

    if ($users->save()) {
        session()->flash('success', 'Data Update Successfully');
        return redirect(route('admins.user.index'));
    } else {
        session()->flash('error', 'Some problem occurred');
        return redirect()->back();
    }
}



    public function create(){
        return view('admins.user.create');
    }

    public function store(Request $request){
        $validation = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'usertype' => 'required|string',
            'password' => 'required|string|min:8',
        ], [
            'name.required' => 'Field name harus diisi.',
            'name.string' => 'Field name harus berupa string.',
            'email.required' => 'Field email harus diisi.',
            'email.email' => 'Field email harus berupa alamat email yang valid.',
            'email.unique' => 'Email ini sudah terdaftar.',
            'usertype.required' => 'Field usertype harus diisi.',
            'usertype.string' => 'Field usertype harus berupa string.',
            'password.required' => 'Field password harus diisi.',
            'password.string' => 'Field password harus berupa string.',
            'password.min' => 'Field password harus memiliki minimal 8 karakter.',
        ]);
    
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
            'password' => $request->password,
        ]);
    
        if ($data) {
            session()->flash('success', 'Data Add Successfully');
            return redirect(route('admins.user.index'));
        } else {
            session()->flash('error', 'Some problem occurred');
            return redirect(route('admins.user.index'));
        }
    }
    

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admins.user.index')->with('success', 'Data deleted successfully');
    }
}
