<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function loginView()
    {
        return view("admin.auth.login");
    }
    public function login(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        // dd($request->input("password"));
        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);

    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function admins()
    {
        $admins = $this->adminsList();
        return view('admin.admins', compact('admins'));
    }
    protected function adminsList()
    {
        $admins = Admin::all();
        return $admins;
    }
    protected function validateAdmin(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }
    public function createAdmin(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];
        $validation = $this->validateAdmin($data);
        if ($validation->fails()) {
            return $validation->errors()->first();
        }
        $result = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        return redirect()->route('admins');
    }
    public function createAdminView()
    {
        return view('admin.create-admin');
    }
}
