@extends('layouts.app')

@section('content')
  <h1>here are all your reservations:</h1>
  <div class="table table-hover ">

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
@endsection
