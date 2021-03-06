<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use App\reservation;
use App\room;
use Controllers\ReservationController;
class UserController extends Controller
{
  function storeClub()
  {
        //dd("hello store is here");
        $hashedPassword = Hash::make(request('password'));
        $email = request('email');
        $user_exists = DB::table('users')->where('email',$email)->get();
        // dd($user_exists->count());
        if ($user_exists ->count() == 0 ) {
          //if the email doesn't exist -> create a new club
            User::create([
              'name'=>request('name'),
              'email' => request('email'),
              'password' => $hashedPassword,
              'id_role' => 3
            ]);
            return view('/home')->with('data','club à été ajouté avec succes!');

      }else {
          //else don't create
            return view('/home')->with('data','club deja exist');

      }
  }

  //storeMod
  function storeMod()
  {
        //dd("hello storemod  is here");
        $hashedPassword = Hash::make(request('password'));
        $email = request('email');
        $user_exists = DB::table('users')->where('email',$email);
        // dd($user_exists);
        if (($user_exists->count() == 0)) {
          //if the email doesn't exist -> create a new club
            User::create([
              'name'=>request('name'),
              'email' => request('email'),
              'password' => $hashedPassword,
              'id_role' => 2
            ]);
            return view('/home')->with('data','moderateur à été ajouté avec succes!');

      }else {
          //else don't create
            return view('/home')->with('data','ce moderateur existe deja');
      }

  }

  //club and mod login
  public function ClubLogin(Request $request)
  {
    //dd('club login is here');
    //dd('test');
    if (Auth::check()) {
          //dd('test');
          return view('/ClubHome');
    
    } else {

          $credentials = $request->only('email', 'password');

          if (Auth::attempt($credentials)) {
               return redirect('/ClubHome');

          }else{
            
               return redirect("/login");
          }
    }
    
  }


  function ClubHome(){
    $id_user = Auth::id();
    $reservations = reservation::where('id_user',$id_user)->get();
    $rooms = room::all('id_room');
    
    return view('ClubHome')->with('reservations',$reservations)->with('rooms',$rooms);
  }




public function ModLogin(Request $request)
  {
    //dd(Auth::check());
    //dd('test');
    if (Auth::check()) {
          //dd('test');
          return redirect('/ModHome');
    
    } else {

          $credentials = $request->only('email', 'password');

          if (Auth::attempt($credentials)) {
               return redirect('/ModHome');

          }else{
            
               return redirect("/login");
          }
    }
    
  }

   function ModHome(){
    // $id_user = Auth::id();
    $reservations = reservation::get()-> toArray();
    //$i;
    for ($i=0; $i < count($reservations); $i++) { 
      $club = User::find($reservations[$i]['id_user']);
      $reservations[$i]['id_user'] = $club->name;
    }
    //dd($reservations);
    
    
    return view('ModHome') -> with('reservations', $reservations);
  }


}
