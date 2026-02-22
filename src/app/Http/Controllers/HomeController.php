<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::get();
        $activeClasses = SchoolClass::get();
        $totalStudents = User::where('role', 'student')->get();
        return view('admin.home', compact('classes', 'activeClasses', 'totalStudents'));
    }

    public function addNewClass(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'school_year' => ['required', 'integer', 'digits:4', 'between:2025,2100']
        ]);

        if ($validator->fails()) {
            echo $validator->errors()->first();
        } else {
            $class = SchoolClass::create($validator->validated());
            $user = User::where('id', $request->id)->update([
                'class_id' => $class->id
            ]);
            if ($user) {
                echo 'done';
            } else {
                echo 'The class was create but the teacher id not found !';
            }
        }
    }
    public function findClass(Request $request)
    {
        $user = SchoolClass::where('id', $request->id)->first();
        if (!$user) {
            echo 'false';
        } else {
            echo $user->name;
        }
    }
    public function updateClass(Request $request)
    {
        $user = User::where('id', $request->name)->update([
            'class_id' => $request->id
        ]);
        if ($user) {
            echo 'done';
        } else {
            echo 'Something went wrong !';
        }
    }
    public function deleteClass(Request $request)
    {
        $class = SchoolClass::find($request->id);

        if ($class) {
            $class->delete();
            echo 'done';
        } else {
            echo 'Class not found!';
        }
    }
}
