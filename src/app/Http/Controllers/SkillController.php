<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    public function index()
    {
    $competences = Skill::get();
    
    $totalCompetences = $competences->count();
    
    return view('admin.skill', compact('competences', 'totalCompetences'));
    }

    public function addNewSkill(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required'
        ]);
        if ($validator->fails()) {
            echo $validator->errors()->first();
        } else {
            Skill::create($validator->validated());
            echo 'done';
        }
    }

    public function findSkill(Request $request)
    {
        $user = Skill::where('id', $request->id)->first();
        if (!$user) {
            echo 'false';
        } else {
            echo $user->title . "<br>" . $user->desc;
        }
    }

    public function deleteSkill(Request $request)
    {
        $class = Skill::find($request->id);

        if ($class) {
            $class->delete();
            echo 'done';
        } else {
            echo 'Skill not found!';
        }
    }
}
