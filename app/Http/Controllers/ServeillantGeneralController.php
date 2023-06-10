<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surveillant_Generale;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Http\Requests\SGRequest;
use App\Models\Employee;
use Illuminate\Support\Carbon;

class ServeillantGeneralController extends Controller
{
    public function create(){
        $to = route('storeSG');
        $title = 'Ajouter SG';
        return view('serveillantGeneral.add_edit_serveillantGeneral',compact('to','title'));
    }

    public function store(SGRequest $request){
        // store user
        $user = new User();
        if($request->image){
            $path = $request->file('image')->store('users/SG');
            $user->image = $path;
        }
        $user->email = $request->prenom . $request->nom . '@surveillantGeneral';
        $user->password = hash::make($request->prenom . $request->nom);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->cin = $request->cin;
        $user->adresse = $request->adresse;
        $user->tel = $request->tel;
        $user->gender = $request->gender;
        $user->dateNaissance = $request->dateNaissance;
        $user->description = $request->description;
        $role=Role::find(5);
        if($role){
            if($role->users()->save($user)){
                // store prof
                $SG = new Surveillant_Generale();
                $user->SG()->save($SG);
                $employee = new Employee;
                $employee->salaire = $request->salaire;
                $employee->date_embauche = $request->date_embauche;
                if ($employee->save()) {
                    $employee->surveillant_generale()->save($SG);
                }
                return redirect('/allSurveillantGeneral');
            }
        }
    }

    public function showall(){
        $SG = Surveillant_Generale::all();
        return view('serveillantGeneral.allserveillantGeneral',compact('SG'));
    }

    public function edit(Surveillant_Generale $surveillant_generale){
        $user = $surveillant_generale->user;
        $to = route('updateSG', ['surveillant_generale' => $surveillant_generale->id]);
        $title = 'Modifier SG';
        return view('serveillantGeneral.add_edit_serveillantGeneral', compact('user', 'to', 'title', 'surveillant_generale'));
    }

    public function update(Surveillant_Generale $surveillant_generale, SGRequest $request){
        $surveillant_generale->user->update($request->all());
        $surveillant_generale->employee->update($request->all());
        return redirect()->route('allSG');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('allSG')->with('success', 'SG deleted successfully.');
    }

    public function profile($id){
        $user = User::find($id);
        $age = Carbon::parse($user->dateNaissance)->age;
        return view('serveillantGeneral.profileserveillantGeneral',compact('user','age'));
    }
}
