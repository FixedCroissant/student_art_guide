<?php

namespace App\Http\Controllers;

//For Authentication purposes.
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
use App\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
    * Allow for the editing of the individual's profile,
    * but will be limited to just their role.
    */
    public function profile()
    {
      //Get User.
      $user = Auth::user();
      //Get All roles
      $roles = Role::pluck('name','id');
      return view ('edit_profile')->with(array('user'=>$user,'roles'=>$roles));
    }

    /**
     * Allow to update the roles.
     */
     public function updateRole(Request $request){
       //Get user id -- user_id
       $userID = $request->input('user_id');
       //Get Role -- role
       $newRole = $request->input('role');
       //Find Role.
       $role = Role::find($newRole);
       //Find User.
       $user = User::find($userID);

       //Check if new Role wanting to add already exists
       if($user->hasRole($role->name))
       {
         //Add Message.
         session()->flash('warning','Role already existed for selected user.');
         //Go Back.
         return Redirect()->back();
       }
       else{
              //Attach Selected Role to USer.
              $user->roles()
              ->attach($role);
              //Add Message.
              session()->flash('success','New Role Added!');
              //Go Back.
              return Redirect()->back();
       }
     }


     /**
      * Remove a particular role from a user.
      */
      public function deleteRole($userID,$roleID){
        //Find user
        $myUser = User::find($userID);
        //Remove Role// detach from the intermediate table containing roles.
        $myUser->roles()->detach($roleID);
        session()->flash('success','Role Removed!');
        //Save Message.
        return Redirect()->back();
      }
}
