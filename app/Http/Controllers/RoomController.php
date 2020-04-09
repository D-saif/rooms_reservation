<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room;
use DB;
use Auth;
class RoomController extends Controller
{
    function store()
    {
      //dd("hello store is heres");
      $is_exists = DB::table('rooms')->where('id_room',request('id_room'))->get();
    //  dd($is_exists->count());

      if (  $is_exists->count() == 0 ) {
        room::create([
          'id_room'=>request('id_room'),
          'block' => request('block')
        ]);
        return view('/home')->with('data',"salle à été ajouté avec succes");
      }else{
        return view('/home')->with('data',"cette salle existe deja!");
      }
    }


    function showEmptyRooms(Request $req1)
    {
      //dd('hello showEmptyRooms is here');

    $date = $req1->input('reservation');
      //dd($date);
    $rooms = DB::table('rooms')->get();

    $req2 = DB::table('reservations')

                ->where('date_time_start','<=',$date)
                ->where('date_time_finish','>=',$date)
                ->where('is_approved',1)
                ->select('id_room')
                ->get();
    //dd($req2);
  //$available_rooms = DB::table('rooms') ->whereNotIn('id_room',$req2->)->get();
    //dd($available_rooms);
      //dd(Auth::check());
      //return $available_rooms;
      // foreach ($rooms as $room) {
      // //dd($available_rooms);
      // }
      //return view('showEmptyRooms')->with('date',$date)->with('available_rooms',$available_rooms);

      //dd($user);
      return view('showEmptyRooms')->with('date',$date)->with('available_rooms',$rooms);

    }
    function index(){
      dd("hello index is here");
    }
}
