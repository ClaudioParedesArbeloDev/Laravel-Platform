<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructors;

class InstructorController extends Controller
{
    public function index()
    {
        $instructors= Instructors::orderBy('surname', 'asc')
            ->paginate(10);
        return view ('instructor.instructors', compact('instructors'));
    }

    public function create()
    {
        return view ('instructor.create');
    }

    public function store(Request $request)

    {
        $instructor = new Instructors();

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $detinationPath = 'images/avatars/';
            $filename = time().'-'.$file->getClientOriginalName();
            $uploadSuccess = $request->file('avatar')->move($detinationPath, $filename);
            $instructor->avatar=$detinationPath.$filename;
        };

        $instructor->name=$request->name;
        $instructor->surname=$request->surname;
        $instructor->email=$request->email;
        $instructor->phone=$request->phone;
        $instructor->avatar=$request->avatar;
        $instructor->bio=$request->bio;





        $instructor->save();

        return redirect('/instructors');
    }

    public function show(Instructors $instructor)

    {

        return view('instructor.instructor', compact('instructor'));
    }

    public function edit(Instructors $instructor)

    {

        return view('instructor.edit', compact('instructor'));
    }

    public function update(Request $request, Instructors $instructor)
    {

        $instructor->name=$request->name;
        $instructor->surname=$request->surname;
        $instructor->email=$request->email;
        $instructor->phone=$request->phone;
        $instructor->avatar=$request->avatar;
        $instructor->bio=$request->bio;

        $instructor->save();

        return redirect('/instructors/$id');
    }

    public function destroy(Instructors $instructor)
    {

        $instructor->delete();

        return redirect('/instructors');
    }
}
