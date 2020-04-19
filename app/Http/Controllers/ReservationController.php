<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\reservation;
class ReservationController extends Controller
{
    function create(){

      return view('createReservation');
    }

    function store($date){
      //dd('store is here');
      //dd(Auth::check());
      //data needed :
              // duration
              /// id_reservation
              // /id_room
              // /id_user
              // /date_time_start
              // /date_time_finish
              // is_approved
              // created_at
              // updated_at
      //$duration = 0;
      $id_room = Request('id_room') ;
      $id_user = Auth::id();
      $date_time_finish = $date; // + $duration ;
      $data = array('id_room' => $id_room, 'id_user' => $id_user , 'date_time_start' => $date,'date_time_finish' => $date_time_finish);
      //dd($data);
      DB::table('reservations')->insert($data);
      return view('ClubHome')->with('msg','salle a ete reserve avec succces');
    }

    function indexMyResevations()
    {
      //dd("indexMyreservations is here");
      $id_user = Auth::id();
      $reservations = reservation::where('id_user',$id_user)->get();
      return $reservations;
    }
}
