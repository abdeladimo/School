<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $roles = Role::all();
            $to = route('storeadmin');
            $title = 'Ajouter Admin';
            return view('Admin.add_admin',compact('roles','to','title'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
          // store user
          $user = new User();
          if($request->image){
              $path = $request->file('image')->store('users');
              $user->image = $path;
          }
          $user->email = $request->prenom . $request->nom . '@admin.ma';
          $user->password = hash::make($request->prenom . $request->nom);
          $user->nom = $request->nom;
          $user->prenom = $request->prenom;
          $user->cin = $request->cin;
          $user->adresse = $request->adresse;
          $user->tel = $request->tel;
          $user->gender = $request->gender;
          $user->dateNaissance = $request->dateNaissance;
          $user->description = $request->description;
          $role=Role::find(1);
          if($role){
              if($role->users()->save($user)){
                  // store admin
                $admin = new Admin();
                $admin->user_id = $request->user_id;
                $user->admin()->save($admin);
                $employee = new Employee;
                $employee->salaire = $request->salaire;
                $employee->date_embauche = $request->date_embauche;
                if ($employee->save()) {
                    $employee->admin()->save($admin);
                }
                return redirect('/allAdmin');
              }
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $admins = Admin::all();
        return view('Admin.alladmins',compact('admins'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
        $user = User::find($admin->user->id);
        $roles = Role::all();
        $to = route('updateadmin', ['admin' => $admin->id]);
        $title = 'Modifier Admin';
        return view('Admin.add_admin', compact('user','roles', 'to', 'title', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Admin $admin, Request $request)
    {
        //
        $admin->user->update($request->all());
        $admin->employee->update($request->all());
        return redirect()->route('alladmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect()->route('alladmin')->with('success', 'admin deleted successfully.');
    }

    public function profile($id){
        $user = User::find($id);
        return view('Admin.profileadmin',compact('user'));
    }
}
