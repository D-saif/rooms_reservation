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

    function store($dateStart ,$dateFinish , $available_room ){
      //dd('store reservation is here');
      //data needed :
              /// dateStart 
              //dd($dateStart);
              /// dateFinish
              //dd($dateFinish);
              /// id_reservation
              
              ///id_room
              //dd(Request('id_room'));
              ///id_user
              //dd(Auth::id());
              // is_approved
              // created_at
              // updated_at
              
      $id_room = Request('id_room') ;
      $id_user = Auth::id();
      
      $data = array('id_room' => $id_room, 'id_user' => $id_user , 'date_time_start' => $dateStart,'date_time_finish' => $dateFinish);
      //dd($data);
      DB::table('reservations')->insert($data);
      return redirect('/ClubHome')->with('msg','salle a ete reserve avec succces');
    }

    function indexMyResevations()
    {
      //dd("indexMyreservations is here");
      $id_user = Auth::id();
      $reservations = reservation::where('id_user',$id_user)->get();
      return $reservations;
    }
}
