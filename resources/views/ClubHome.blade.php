@extends('layouts.app')
@section('content')
<div class="container">

    <?php
       $Club = Auth::user()->name;
    //   $rooms = DB::table('rooms')->where('is_available', 'YES')->get();

    // //  $date=$_POST["reservation"];
    ?>
    <h1> hello {{$Club}} !!</h1>
    <h6 color="red"> {{ $msg ?? "" }} </h6>
    <h5>enter the date of reservation:</h5>


    <form method="get" action="/rooms">
      @csrf
      <input type="datetime-local" name="reservation">
      <input  type="submit" name="button1" value="search">
    </form>

    <form method="get" action="/reservations/myReservations" >
      @csrf
      <input type="submit" name="button2" value="my reservations">
    </form>


</div>
@endsection
