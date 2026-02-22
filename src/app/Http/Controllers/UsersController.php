<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::get();
        $admins = User::where('role', 'admin')->get();
        $teachers = User::where('role', 'teacher')->get();
        $students = User::where('role', 'student')->get();
        return view('admin.users', compact('users', 'admins', 'teachers', 'students'));
    }

    public function submitRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first' => 'required|min:3',
            'last' => 'required|min:2',
            'role' => ['required'],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            echo $validator->errors()->first();
        } else {
            User::create([
                'first' => $request->first,
                'last' => $request->last,
                'role' => $request->role,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            echo 'done';
        }
    }
    public function findUser(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if (!$user) {
            echo 'false';
        } else {
            echo $user->first . ' ' . $user->last;
        }
    }
    public function stopUser(Request $request)
    {
        $user = User::where('id', $request->id)->update([
            'status' => 0
        ]);
        echo 'done';
    }
    public function onUser(Request $request)
    {
        $user = User::where('id', $request->id)->update([
            'status' => 1
        ]);
        echo 'done';
    }
}
