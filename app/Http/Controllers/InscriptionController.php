<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classe;
use App\Models\Inscription;
use App\Http\Requests\InscriptionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class InscriptionController extends Controller
{
    public function create(){
        $students = Student::all();
        $classes = Classe::all();
        return view('inscription.allinscription',compact('students','classes'));
    }

    public function store(Request $request){
        $inscription = new Inscription();
        $inscription->montant = $request->montant;
        $inscription->versement = $request->versement;
        $student = Student::find($request->etudiant);
        if ($student) {
            $student->inscriptions()->save($inscription);
        }
        return redirect()->route('allinscription');
    }

    public function showall()
    {
        $inscriptions = Inscription::all();
        $students = Student::all();
        return view('inscription.allinscription', compact('inscriptions','students'));
    }

    public function edit($id){
        $inscription = Inscription::find($id);
        return $inscription;
    }

    public function update(Request $request, $id){
        $inscription = Inscription::find($id);
        $inscription->update($request->all());
        return redirect()->route('allinscription');
    }

    public function destroy($id)
    {
        $inscription = Inscription::find($id);
        $inscription->delete();
        return redirect()->route('allinscription')->with('success', 'Room deleted successfully.');
    }
}
