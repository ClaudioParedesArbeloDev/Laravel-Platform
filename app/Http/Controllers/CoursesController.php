<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\User;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Courses::with('user')
            ->orderBy('category', 'asc')
            ->paginate(10);
        return view('courses.courses', compact('courses'));
    }

    public function create()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['admin', 'instructor']);
        })->get();
    
        return view('courses.create', compact('users'));
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
        $curse->user_id = $request->user_id;
        $curse->active = $request->active;

        $curse->save();
        return redirect()->route('courses.index');
    }

    public function show($id)
    {
        $course = Courses::findOrFail($id);
        return view('courses.course', compact('course', 'id'));
    }

    public function edit($id)
    {
        $course = Courses::findOrFail($id);
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['admin', 'instructor']);
        })->get();

        return view('courses.edit', compact('course', 'users', 'id'));
    }

    public function update(Request $request, $id)
    {
        $course = Courses::findOrFail($id);

        $course->name = $request->name;
        $course->description = $request->description;
        $course->image = $request->image;
        $course->price = $request->price;
        $course->days = $request->days;
        $course->schedule = $request->schedule;
        $course->duration = $request->duration;
        $course->category = $request->category;
        $course->capacity = $request->capacity;
        $course->user_id = $request->user_id;
        $course->active = $request->active;

        $course->save();

        return redirect()->route('courses.show', $id);
    }

    public function destroy($id)
    {
        $course = Courses::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index');
    }

    public function cursos()
    {
        $courses = Courses::with('user')
            ->orderBy('category', 'asc')
            ->paginate(10);
        
        $coursesByCategory = $courses->groupBy('category');

        return view('cursos', compact('courses', 'coursesByCategory'));
        
    }

    public function cursoDetail($id)
    {
        $course = Courses::findOrFail($id);
        return view('courses.courseDetail', compact('course', 'id'));
    }

}
