@extends('layouts.app')
@section('content')
<div class="container">

    <?php
      $Club = Auth::user()->name;
      $rooms = DB::table('rooms')->where('is_available', 'YES')->get();
      $roomsA = $rooms->where('block','A');
      $roomsB = $rooms->where('block','B');
      $roomsC = $rooms->where('block','C');
    //  $date=$_POST["reservation"];
    ?>
    <h1> hello {{$Club}} !!</h1>
    <h5>enter the date of reservation:</h5>


    <form method="get" action="/showEmptyRooms">
      @csrf
      <input type="date" name="reservation">
      <input  type="submit" name="button1" value="search">
    </form>


    <!--
   //@php
      //echo App\Http\Controllers\showEmptyRoomsController::showEmptyRooms($Date);
    //  $date=$_GET[reservation];
      //echo $date;
   //@endphp

   <h2>here is the list of empty rooms</h2>
   <h3>block A</h3>
   @foreach($roomsA as $roomA)
    <div class="card">
      {{$roomA->id_room}}
    </div>
      <br>
   @endforeach

   <h3>block B</h3>
   @foreach($roomsB as $roomB)
   <div class="card">
     {{$roomB->id_room}}
   </div>
      <br>
   @endforeach
   <h3>block C</h3>
   @foreach($roomsC as $roomC)
   <div class="card">
     {{$roomC->id_room}}
   </div>
      <br>
   @endforeach
   -->
</div>
@endsection
