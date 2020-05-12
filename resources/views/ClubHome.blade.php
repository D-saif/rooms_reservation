@extends('layouts.app')
@section('content')
<div class="container">

    <?php
       $Club = Auth::user()->name;
    //   $rooms = DB::table('rooms')->where('is_available', 'YES')->get();

    // //  $date=$_POST["reservation"];
    ?>
    <h1> bonjour {{$Club}} {{$msg ?? ""}}!!</h1>
    <h6 color="red"> {{ $msg ?? "" }} </h6>
    <!--<h5>entrer la date de reservation:</h5>


    <form method="get" action="/rooms">
      @csrf
      <input type="datetime-local" name="reservation">
      <input  type="submit" name="button1" value="search">
    </form> -->

    <br>
    <h4>Vous pouvez ajouter une reservation:</h4>
    <form method="get " action="/reservations/create">
      @csrf
      <button class="btn btn-primary">Ajouter</button>
    </form>


    <br>
    <h4>Vous pouvez chercher la disponibilité d'une salle:</h4>
    <form method="get " action="/rooms/availability">
        @csrf
        <select  name="room">
          @foreach($rooms as $room)
              <option name='room' value="{{$room->id_room}}">{{ $room->id_room }}</option>
          @endforeach
        </select>

        <button class="btn btn-primary">chercher</button>
    </form>
    
    
    <hr>
    <div class="table table-hover ">
        <h4>Tout mes reservations</h4>
        <table>
        <tr class="table-secondary">
          <th><b>salle</b></th>
          <th><b>date de debut</b></th>
          <th><b>date de fin</b></th>
          <th><b>approuvée</b></th>
          <th><b>creer a</b></th>
          <th><b>modifier a</b></th>
        </tr>
        @foreach($reservations as $reservation)
        <?php
            if ($reservation->is_approved == 0) {
              $approved = 'NO';
            } else {
              $approver = 'YES';
            }
            //dd($reservations);
         ?>

        <tr >
          <th>{{$reservation-> id_room }}</th>
          <th>{{$reservation-> date_time_start }}</th>
          <th>{{$reservation-> date_time_finish }}</th>
          <th>{{$reservation-> is_approved }}</th>
          <th>{{$reservation-> created_at ?? "_"}}</th>
          <th>{{$reservation-> updated_at ?? "_"}}</th>
        </tr>
        @endforeach
    </table>

    </div>


</div>
@endsection
