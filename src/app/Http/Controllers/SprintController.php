<?php

namespace App\Http\Controllers;

use App\Models\Sprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function Symfony\Component\Clock\now;

class SprintController extends Controller
{
    public function index()
    {
        $sprints = Sprint::get();
        $activeSprints = Sprint::where('start_date', '<=', now())->where('end_date', '>', now())->first('name');
        $upcomingSprints = Sprint::where('start_date', '>', now())->get();
        $completedSprints = Sprint::where('end_date', !null)->get();
        return view('admin.sprint', compact('sprints', 'activeSprints', 'upcomingSprints', 'completedSprints'));
    }

    public function addNewSprint(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d'
        ]);
        if ($validator->fails()) {
            echo $validator->errors()->first();
        } else {
            Sprint::create($validator->validated());
            echo 'done';
        }
    }

    public function findSprint(Request $request)
    {
        $user = Sprint::where('id', $request->id)->first();
        if (!$user) {
            echo 'false';
        } else {
            echo $user->name;
        }
    }

    public function deleteSprint(Request $request)
    {
        $class = Sprint::find($request->id);

        if ($class) {
            $class->delete();
            echo 'done';
        } else {
            echo 'Sprint not found!';
        }
    }
}