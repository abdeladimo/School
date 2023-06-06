<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Student;
use App\Models\Family;
use App\Http\Requests\FamilyRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class FamilyController extends Controller
{
    public function create(){
        $to = route('storefamily');
        $title = 'Ajouter parent';
        return view('parent.addparent',compact('to','title'));
    }

    public function store(FamilyRequest $request){

        // store user
        $user = new User();
        if($request->image){
            $path = $request->file('image')->store('users/familys');
            $user->image = $path;
        }
        $user->email = $request->prenom . $request->nom . '@family';
        $user->password = hash::make($request->prenom . $request->nom);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->cin = $request->cin;
        $user->adresse = $request->adresse;
        $user->tel = $request->tel;
        $user->gender = $request->gender;
        $user->dateNaissance = $request->dateNaissance;
        $user->description = $request->description;

        $role=Role::find(4);
        if($role){
            if($role->users()->save($user)){
                // store family
                $family = new family();
                $family->secondNumber = $request->secondNumber;
                $user->family()->save($family);
                return redirect('/allFamily');

            }
        }else {
            return back();
        }
    }

    public function edit($id){
        $user = User::find($id);
        $to = route('updatefamily', ['id' => $id]);
        $title = 'Modifier parent';
        $parents = Family::all();
        foreach ($parents as $parent) {
            if($parent->user_id == $user->id){
                $secondNumber = $parent->secondNumber;
                break;
            }
        }
        return view('parent.addparent', compact('user','to', 'title', 'secondNumber'));
    }

    public function update(FamilyRequest $request, $id){
        $user = User::find($id);
        $family = $user->family;
        $family->update(['secondNumber' => $request->secondNumber]);
        return redirect()->route('editfamily', $user->id);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('allfamily')->with('success', 'Parent deleted successfully.');
    }

    public function profile($id){
        $user = User::find($id);
        $age = Carbon::parse($user->dateNaissance)->age;
        $parents = Family::all();
        foreach ($parents as $parent) {
            if($parent->user_id == $user->id){
                $secondNumber = $parent->secondNumber;
                break;
            }
        }
        return view('parent.profileparent',compact('user','age','secondNumber'));
    }

    public function showall(){
        $familys = family::all();
        return view('parent.allparent',compact('familys'));
    }
}
