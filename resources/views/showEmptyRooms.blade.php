@extends('layouts.app')

@section('content')

<div class="container">

    <h4>Voila tous les salles vides du {{ $dateStart }} jusqu'à {{ $dateFinish }}</h1>
    <hr>
    <div class="table table-hover ">
      <table class="">
           <tr class="table-secondary">
            <th>salle</th>
            <th>cliquer pour reserver</th>
          </tr>
          @foreach($available_rooms as $available_room)
            <form  action="/reservations/{{ $dateStart }}/{{ $dateFinish }}/{{ $available_room }}/store" method="post">
              @csrf
              <tr class ="table">
                <th name="id_room"> {{ $available_room }}</th>
                <th>
                    <button class="btn btn-primary" type="submit" name="reserve" value="reserve">reserver</button>
                </th>

              </tr>
            </form>
          @endforeach
      </table>
    </div>
</div>

@endsection
