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
    

    $dateStart = $req1->input('dateStart');
    $dateFinish = $req1->input('dateFinish');

    //get all rooms
    $rooms = DB::table('rooms')->select('id_room')->get();
      //transform each item into string (id_room)
      $rooms->transform(function ($item, $key) {
          return $item->id_room;
      });


    //get all reserved rooms
    $reservedRooms = DB::table('reservations')

                ->where('date_time_start','<=',$dateStart)
                ->where('date_time_finish','>=',$dateFinish)
                ->where('is_approved',1)
                ->select('id_room')
                ->get();
      //transform each item into string (id_room)
      $reservedRooms->transform(function ($item, $key) {
          return $item->id_room;
      });


      //get all empty rooms (rooms - reserved rooms)
      $emptyRooms= $rooms->diff($reservedRooms);

      // var_dump($rooms);echo "<br><br><br>";
      // var_dump($reservedRooms);echo "<br><br><br>";
      // dd($emptyRooms);
      //reservationData = array("dateStart"=>$dateStart, "dateFinish"=>$dateFinish,);

      
      return view('showEmptyRooms')->with('available_rooms',$emptyRooms)
                                   ->with('dateStart' , $dateStart)
                                   ->with('dateFinish' , $dateFinish);

    }

    function index(){
      dd("hello index is here");
    }
}
