<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Instructors;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Courses::orderBy('category', 'asc')
            ->paginate(10);
        return view('courses.courses', compact('courses'));
    }

    public function create()
    {
        $instructors = Instructors::all();
        return view('courses.create', compact('instructors'));
    }

    public function store(Request $request)
    {
        $curse = new Courses();

        $curse->name = $request->name;
        $curse->description = $request->description;
        $curse->image = $request->image;
        $curse->price = $request->price;
        $curse->days = $request->days;
        $curse->schedule = $request->schedule;
        $curse->duration = $request->duration;
        $curse->category = $request->category;
        $curse->capacity = $request->capacity;
        $curse->instructor_id = $request->instructor_id;
        $curse->active = $request->active;

        $curse->save();
        return redirect()->route('courses.index');
    }

    public function show(Courses $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Courses $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Courses $course)
    {
        $course->name = $request->name;
        $course->description = $request->description;
        $course->image = $request->image;
        $course->price = $request->price;
        $course->days = $request->days;
        $course->schedule = $request->schedule;
        $course->duration = $request->duration;
        $course->category = $request->category;
        $course->capacity = $request->capacity;
        $course->instructor_id = $request->instructor_id;
        $course->active = $request->active;

        $course->save();

        return redirect()->route('courses.index');
    }

    public function destroy(Courses $course)
    {
        $course->delete();

        return redirect()->route('courses.index');
    }

}
