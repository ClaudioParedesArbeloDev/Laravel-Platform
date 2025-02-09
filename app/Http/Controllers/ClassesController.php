<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Classes;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Classes::with('course')
            ->orderBy('course.name', 'asc');
            return view('dashboard.courses.classes', compact('classes'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('dashboard.courses.classesCreate', compact('courses'));
    }

    public function store(Request $request)
    {
        $classes = new Classes();

        $classes->title = $request->title;
        $classes->date = $request->date;
        $classes->start_time = $request->start_time;
        $classes->pdf = $request->pdf;
        $classes->powerpoint = $request->powerpoint;
        $classes->video = $request->video;
        $classes->meet_link = $request->meet_link;
        $classes->course_id = $request->input('course_id');

        $classes->save();

        return redirect()->route('classes.index')->with('success', 'Class created successfully!');
    }

    public function show($id)
    {
        $classes = Classes::findOrFail($id);

        return view('dashboard.courses.class', compact('classes'));
    }

    public function edit($id)
    {
        $classes = Classes::findOrFail($id);

        return view('dashboard.courses.editClass', compact('classes'));
    }

    public function update(Request $request, $id)
    {
        $classes = Classes::findOrFail($id);

        $classes->title = $request->title;
        $classes->date = $request->date;
        $classes->start_time = $request->start_time;
        $classes->pdf = $request->pdf;
        $classes->powerpoint = $request->powerpoint;
        $classes->video = $request->video;
        $classes->meet_link = $request->meet_link;

        $classes->save();

        return redirect()->route('cursos.classes', $id);
    }

    public function destroy($id)
    {
        $classes = Classes::findOrFail($id);
        $classes->delete();

        return redirect()->route('dashboard.classes.index');
    }

   
}
