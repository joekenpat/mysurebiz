<?php

namespace App\Http\Controllers\users;

use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        return view('users.notifications');
    }

    public function Update(Request $request)
    {
        $request->validate([
            'type' => 'required|in:lesson,course',
            'id' => 'required'
        ]);

        if($request->type == "course"){
            Assignment::where(['user_id' => Auth::id(),
                'course_id' => $request->id])
                ->whereNull('lesson_id')
                ->update([
                    'seen' => 1
                ]);
        }else{
            Assignment::where(['user_id' => Auth::id(),
                'lesson_id' => $request->id])
                ->update([
                    'seen' => 1
                ]);
        }
        return response()->json(["Ok"]);
    }
}
