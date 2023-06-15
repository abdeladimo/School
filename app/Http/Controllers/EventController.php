<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class EventController extends Controller
{
    // public function create(){
    //     $students = Student::all();
    //     $classes = Classe::all();
    //     return view('event.allevent',compact('students','classes'));
    // }

    public function store(Request $request){
        $event = new Event();
        $event->type = $request->type;
        $event->date = $request->date;
        $event->heur = $request->heur;
        $event->prix = $request->prix;
        $event->save();
        return redirect()->route('allevent');
    }

    public function showall()
    {
        $events = Event::all();
        return view('evente.allevent', compact('events'));
    }

    public function edit($id){
        $event = Event::find($id);
        return $event;
    }

    public function update(Request $request, $id){
        $event = Event::find($id);
        $event->update($request->all());
        return redirect()->route('allevent');
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('allevent')->with('success', 'Room deleted successfully.');
    }
}
