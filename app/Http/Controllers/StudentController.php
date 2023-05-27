<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Student;
use App\Http\Requests\StudentRequest;
use App\Models\Family;
use App\Models\Classe;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
class StudentController extends Controller
{
    public function create(){
        $to = route('storestudent');
        $title = 'Ajouter eleve';
        $families = Family::all();
        $classes = Classe::all();
        return view('student.addstudent',compact('to','title','families','classes'));
    }

    public function store(StudentRequest $request){

        // store user
        $user = new User();
        if($request->image){
            $path = $request->file('image')->store('users/students');
            $user->image = $path;
        }
        $user->email = $request->prenom . $request->nom . '@student';
        $user->password = hash::make($request->prenom . $request->nom);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->cin = $request->cin;
        $user->adresse = $request->adresse;
        $user->tel = $request->tel;
        $user->gender = $request->gender;
        $user->dateNaissance = $request->dateNaissance;
        $user->description = $request->description;

        $role=Role::find(3);
        if($role){
            if($role->users()->save($user)){
                // store student
                $student = new student();
                $user->student()->save($student);
                return redirect('/allStudent');

            }
        }
    }

    public function edit($id){
        $user = User::find($id);
        $to = route('updatestudent', ['id' => $id]);
        $title = 'Modifier éleve';
        $families = Family::all();
        $classes = Classe::all();
        return view('student.addstudent', compact('user','to', 'title' ,'families','classes'));
    }

    public function update(StudentRequest $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('editstudent', $user->id);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('allstudent')->with('success', 'Student deleted successfully.');
    }

    public function profile($id){
        $user = User::find($id);
        $age = Carbon::parse($user->dateNaissance)->age;
        return view('student.profilestudent',compact('user','age'));
    }


    public function showall(){
        $students = Student::all();
        return view('student.allstudent',compact('students'));
    }
}
