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

    

    function reject($id_reservation)
    {

      $reservation = reservation::find($id_reservation);

      $reservation->is_approved = -1;

      $reservation->save();
      return redirect('/ModHome');
    }


    function approve($id_reservation)
    {
      $reservation = reservation::find($id_reservation);
      /*
      *
      *reject all reservation of the 
      *same room in the same date
      */
      $dateStart = $reservation->date_time_start;
      $dateFinish = $reservation->date_time_finish;
      $id_room = $reservation->id_room;
      //dump($dateStart);dump($reservation->id_room);dd($dateStart);

      $auto_rejected_res = DB::table('reservations')
                ->where('date_time_start','<=',$dateStart)
                ->where('date_time_finish','>=',$dateFinish)
                //->where('is_approved',0)
                ->where('id_room',$id_room)
                ->select('id_reservation')
                ->get();
      //dump($auto_rejected_res);dd(reservation::get());
      foreach ($auto_rejected_res as $arr ) {
        $this->reject($arr->id_reservation);
        
      }


      /*
      |
      |change status of reservation to 1
      |
      */
      
      $reservation->is_approved = 1;
      $reservation->save();
      
      return redirect('/ModHome');
    }




}
