<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Prof;
use App\Models\matiere;
use App\Http\Requests\ProfRequest;
use App\Models\Employee;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class ProfController extends Controller
{
    public function create(){
        $to = route('storeprof');
        $title = 'Ajouter professeur';
        $matieres = Matiere::all();
        return view('prof.addprof',compact('to','title','matieres'));
    }

    public function store(ProfRequest $request){
        // store user
        $user = new User();
        if($request->image){
            $path = $request->file('image')->store('users/profs');
            $user->image = $path;
        }
        $user->email = $request->prenom . $request->nom . '@prof';
        $user->password = hash::make($request->prenom . $request->nom);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->cin = $request->cin;
        $user->adresse = $request->adresse;
        $user->tel = $request->tel;
        $user->gender = $request->gender;
        $user->dateNaissance = $request->dateNaissance;
        $user->description = $request->description;
        $role=Role::find(2);
        if($role){
            if($role->users()->save($user)){
                // store prof
                $prof = new prof();
                $prof->matiere_id = $request->matiere_id;
                $user->prof()->save($prof);
                $employee = new Employee;
                $employee->salaire = $request->salaire;
                $employee->date_embauche = $request->date_embauche;
                if ($employee->save()) {
                    $employee->prof()->save($prof);
                }
                return redirect()->route('allprof');
            }
        }
    }

    public function showall(){
        $profs = prof::all();
        return view('prof.allprof',compact('profs'));
    }

    public function edit(Prof $prof){
        $user = $prof->user;
        $to = route('updateprof', ['prof' => $prof->id]);
        $title = 'Modifier professeur';
        return view('prof.addprof', compact('user', 'to', 'title', 'prof'));
    }

    public function update(Prof $prof, ProfRequest $request){
        $prof->user->update($request->all());
        $prof->employee->update($request->all());
        return redirect()->route('allprof');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('allprof')->with('success', 'Prof deleted successfully.');
    }

    public function profile($id){
        $user = User::find($id);
        $age = Carbon::parse($user->dateNaissance)->age;
        return view('prof.profileprof',compact('user','age'));
    }
}
