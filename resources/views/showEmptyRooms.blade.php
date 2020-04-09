@extends('layouts.app')

@section('content')
    <h1>Voila tous les salles videes dans la date : {{$date}}:</h1>


    <div class="table table-hover table-responsive">
      <table class="">
           <tr class="table table-secondary">
            <th>salle</th>
            <th>cliquer pour reserver</th>
          </tr>
          @foreach($available_rooms as $available_room)
            <form  action="/reservation/{{ $date }}/{{$available_room -> id_room}}/store" method="post">
              @csrf
              <tr class ="table">
                <th name="id_room"> {{$available_room -> id_room}}</th>
                <th>
                    <button class="btn btn-primary" type="submit" name="reserve" value="reserve">reserver</button>
                </th>

              </tr>
            </form>
          @endforeach
      </table>
    </div>


@endsection
