<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Models\Course;
use App\Models\User;



class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::with('user')
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
    $course = new Course();

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
        $course = Course::findOrFail($id);
        return view('courses.course', compact('course', 'id'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['admin', 'instructor']);
        })->get();

        return view('courses.edit', compact('course', 'users', 'id'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

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
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index');
    }

    public function cursos()
    {
        $courses = Course::with('user')
            ->orderBy('category', 'asc')
            ->paginate(10);
        
        $coursesByCategory = $courses->groupBy('category');

        return view('cursos', compact('courses', 'coursesByCategory'));
        
    }

    public function cursoDetail($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.courseDetail', compact('course', 'id'));
    }

    public function enroll(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
            'enroll_day' => 'nullable',
        ]);

        $user = User::findOrFail($request->user_id);
        
        $course = Course::findOrFail($request->course_id);

        $enroll_day = $request->enroll_day;

        $columnName = 'enroll_day_'.$enroll_day;

        $isEnrolled = $user->courses()->where('course_id', $request->course_id)->exists();

        if ($isEnrolled) {
            return redirect()->back()->with('error', 'Ud. ya está inscrito en este curso');
        }

        if(empty($course->days2)){

            $user->courses()->attach($request->course_id);   
            
            return redirect()->route('dashboard');

        } else{
            if($course->{$columnName}== 0){
                return redirect()->back()->with('error', 'No hay cupos disponibles para este dia');
            }
            $user->courses()->attach($request->course_id, ['enroll_day' => $request->enroll_day]);
            $course->decrement($columnName, 1);
            return redirect()->route('dashboard');
        }
        
        
        
    }

    public function cursosDashboard()
    {
        $courses = Course::with('user')
            ->orderBy('category', 'asc')
            ->paginate(10);
        
        $coursesByCategory = $courses->groupBy('category');

        return view('dashboard.cursos', compact('courses', 'coursesByCategory'));
        
    }

    public function showStudents($courseId)
    {
        $course = Course::with(['students' => function($query) {
            $query->orderBy('lastname', 'asc');
        }])->findOrFail($courseId);


        return view('dashboard.courses.students', compact('course'));
    }

    public function updateStatus(Request $request, $courseId, $userId)
    {
        // Obtén el estudiante y el curso
        $course = Course::findOrFail($courseId);
        $user = User::findOrFail($userId);

        // Actualiza el estado en la tabla pivot
        $course->students()->updateExistingPivot($user->id, [
            'status' => $request->status
        ]);

        return redirect()->route('cursos.students', $courseId)->with('success', 'Status updated successfully!');
    }

    public function showClasses($courseId)
{
    $course = Course::findOrFail($courseId);  
    $classes = $course->classes; 

    return view('dashboard.courses.classesCourse', compact('course', 'classes'));
}

    public function showClassesStudents($courseId)
{
    $course = Course::with(['classes' => function ($query) {
        $query->orderBy('date')->orderBy('start_time');
    }])->findOrFail($courseId);

    return view('dashboard.courses.classes', compact('course'));
}



    
}
