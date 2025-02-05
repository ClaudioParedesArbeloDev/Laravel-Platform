<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
    $course = new Courses();

    $course->name = $request->name;
    $course->description = $request->description;
    $course->image = $request->image;
    $course->price = $request->price;
    $course->days1 = $request->days1;
    $course->days2 = $request->days2;
    $course->duration = $request->duration;
    $course->category = $request->category;
    $course->capacity = $request->capacity;
    $course->user_id = $request->user_id;
    $course->active = $request->active;
    


    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension(); 
        $request->image->storeAs('courses', $imageName, 'public');
        $course->image = $imageName; 
    }


    
    
    $course->save();

    
    
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
        $course->days1 = $request->days1;
        $course->days2 = $request->days2;
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

    public function enroll(Request $request)
    {    
        $user = Auth::user();
        $course = Course::findOrFail($request->input('course_id'));
        $selectedDay = $request->input('day');

      
        if ($user->courses->contains($course->id)) {
            return back()->with('error', 'Ya estás inscrito en este curso.');
        }

    
        if ($selectedDay == 1 && $course->enroll_day_1 <= 0) {
            return back()->with('error', 'No hay más cupos disponibles para el Día 1.');
        }

        if ($selectedDay == 2 && $course->enroll_day_2 <= 0) {
            return back()->with('error', 'No hay más cupos disponibles para el Día 2.');
        }

       
        $user->courses()->attach($course->id, ['enroll_day' => $selectedDay]);

       
        if ($selectedDay == 1) {
            $course->decrement('enroll_day_1');
        } elseif ($selectedDay == 2) {
            $course->decrement('enroll_day_2');
        }

        return back()->with('success', 'Te has inscrito correctamente en el curso.');
    }
    
}
