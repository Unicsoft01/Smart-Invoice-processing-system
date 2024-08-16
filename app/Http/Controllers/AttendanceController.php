<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendance = Attendance::latest()->get();

        $usersUnique = $attendance->unique(['created_at']);
        // $userDuplicates = $attendance->diff($usersUnique);
        // return $usersUnique;
        return view('user.attendance.index')->with(['attendance' => $usersUnique]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loadCourses = Course::latest()->get();
        // return $loadCourses;
        return view('user.attendance.create')->with(['loadCourses' => $loadCourses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save = Attendance::create([
            'course' => $request->course,
            'studentMat' => $request->matNo,
            'user_id' => $request->user_id,
            'studentName' => $request->name,
            'attendanceType' => $request->exampleRadios,
        ]);

        // return $save;
        return back();
        // if ($save) {
        //     return back();//->with(AlertController::SendAlert());
        // }
        // else
        // {
        //     back();//->with(AlertController::SendAlert('error', 'An error occurred!'));
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        // return admin attendance page

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    public function adminAttendance()
    {

        $attendance = Attendance::latest()->get();
        return view('admin.attendance-preview')->with(['attendance' => $attendance]);
    }
    public function viewStudents()
    {
        $users = User::where('user_type', '=', 'user')->latest()->get();
        return view('admin.users_page')->with(['users' => $users]);
    }
}
