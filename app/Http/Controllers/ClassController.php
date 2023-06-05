<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Niveau;
use App\Models\Surveillant_Generale;
use App\Models\Classe;
use App\Models\Prof;

class ClassController extends Controller
{
    public function showall(){
        $class = Classe::all();
        $niveaux = Niveau::all();
        $sg = Surveillant_Generale::all();
        $profs = Prof::all();
        return view('class.allclass', compact('niveaux','sg','profs','class'));
    }

    public function index()
    {
        $classes = Classe::all();
        return response()->json(
            compact(
                'classes',
            )
        );
    }

    public function store(Request $request){
        $class = new Classe();
        $class->nom = $request->nom;
        $request->whenFilled('nb_max_student', function ($input) use ($class) {
            $class->nb_max_student = $input;
        });
        $class->niveau_id = $request->nv;
        $class->surveillant_general_id = $request->sg;
        $class->prof_id = $request->prof;
        $class->save();
        return redirect()->route('allclass');
    }

    public function edit($id){
        $class = Classe::find($id);
        return $class;
    }

    public function update(Request $request, $id){
        $class = Classe::find($id);
        $class->update($request->all());
        return redirect()->route('allclass');
    }

    public function destroy($id)
    {
        $class = Classe::find($id);
        $class->delete();
        return redirect()->route('allclass')->with('success', 'Prof deleted successfully.');
    }
}
