@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="table table-hover ">
        <h4>Tout les réservations en attente</h4>
        <table>
        <tr class="table-secondary">
          <th><b>id de la  reservatoin</b></th>
          <th><b>club</b></th>
          <th><b>salle</b></th>
          <th><b>date debut</b></th>
          <th><b>date fin</b></th>
          <th><b>Etat</b></th>
          <th><b>Demande</b></th>
          <th><b>creer a</b></th>
          <th><b>modifiée a</b></th>
          <th></th><th></th>
        </tr>
        @foreach($reservations as $reservation)
        
	        @if($reservation ['is_approved'] == 0)
		        <tr >
			          <th>{{$reservation['id_reservation'] }}</th>
			          <th>{{$reservation ['id_user'] }}</th>
			          <th>{{$reservation ['id_room'] }}</th>
			          <th>{{$reservation ['date_time_start'] }}</th>
			          <th>{{$reservation ['date_time_finish'] }}</th>
			          <th>{{$reservation ['is_approved']}}</th>

                <form id = "showFile" method = "get" action="showFile/{{$reservation ['file']}}/show">

                    <th>  <a onclick = "document.getElementById('showFile').submit();" href="#"> {{$reservation ['file']}} </a>  </th>

                </form>

			          <th>{{$reservation ['created_at'] ?? "_"}}</th>
			          <th>{{$reservation ['updated_at'] ?? "_"}}</th>

			          <form action="/reservations/{{ $reservation['id_reservation'] }}/approve" method="POST">
			          	@csrf
			          	<th>
			          		<button class="btn btn-primary" type="submit" name="approve" value="reserve">approuver</button>
			          	</th>

			          </form>

			          <form action="/reservations/{{ $reservation['id_reservation'] }}/reject" method="POST">
			          	@csrf
			          	<th><button class="btn btn-danger" type="submit" name="reject" value="reserve">rejeter</button></th>

		          </form>

		        </tr>
	        @endif

        @endforeach
    </table>

    </div>

    <div class="table table-hover ">
        <h4>Tout les réservations confirmées</h4>
        <table>
        <tr class="table-secondary">
          <th><b>id de la  reservatoin</b></th>
          <th><b>club</b></th>
          <th><b>salle</b></th>
          <th><b>date debut</b></th>
          <th><b>date fin</b></th>
          <th><b>Etat</b></th>
          <th><b>creer a</b></th>
          <th><b>modifiée a</b></th>
          <th></th><th></th>
        </tr>
        @foreach($reservations as $reservation)
        
	        @if($reservation ['is_approved'] == 1)
		        <tr >
			          <th>{{$reservation['id_reservation'] }}</th>
			          <th>{{$reservation ['id_user'] }}</th>
			          <th>{{$reservation ['id_room'] }}</th>
			          <th>{{$reservation ['date_time_start'] }}</th>
			          <th>{{$reservation ['date_time_finish'] }}</th>
			          <th>{{$reservation ['is_approved']}}</th>
			          <th>{{$reservation ['created_at'] ?? "_"}}</th>
			          <th>{{$reservation ['updated_at'] ?? "_"}}</th>

			          <form action="/reservations/{{ $reservation['id_reservation'] }}/approve" method="POST">
			          	@csrf
			          	<th>
			          		<button class="btn btn-primary" type="submit" name="approve" value="reserve">approuver</button>
			          	</th>

			          </form>

			          <form action="/reservations/{{ $reservation['id_reservation'] }}/reject" method="POST">
			          	@csrf
			          	<th><button class="btn btn-danger" type="submit" name="reject" value="reserve">reject</button></th>

		          </form>

		        </tr>
	        @endif

        @endforeach
    </table>

    </div>

        <div class="table table-hover ">
            <h4>Tout les réservations rejetés</h4>
            <table>
            <tr class="table-secondary">
              <th><b>id de la  reservatoin</b></th>
              <th><b>club</b></th>
              <th><b>salle</b></th>
              <th><b>date debut</b></th>
              <th><b>date fin</b></th>
              <th><b>Etat</b></th>
              <th><b>creer a</b></th>
              <th><b>modifiée a</b></th>
              <th></th><th></th>
            </tr>
            @foreach($reservations as $reservation)
            
    	        @if($reservation ['is_approved'] == -1)
    		        <tr >
    			          <th>{{$reservation['id_reservation'] }}</th>
    			          <th>{{$reservation ['id_user'] }}</th>
    			          <th>{{$reservation ['id_room'] }}</th>
    			          <th>{{$reservation ['date_time_start'] }}</th>
    			          <th>{{$reservation ['date_time_finish'] }}</th>
    			          <th>{{$reservation ['is_approved']}}</th>
    			          <th>{{$reservation ['created_at'] ?? "_"}}</th>
    			          <th>{{$reservation ['updated_at'] ?? "_"}}</th>

    			         <!--  <form action="/reservations/{{ $reservation['id_reservation'] }}/approve" method="POST">
    			          	@csrf
    			          	<th>
    			          		<button class="btn btn-primary" type="submit" name="approve" value="reserve">approuver</button>
    			          	</th>

    			          </form>

    			          <form action="/reservations/{{ $reservation['id_reservation'] }}/reject" method="POST">
    			          	@csrf
    			          	<th><button class="btn btn-danger" type="submit" name="reject" value="reserve">reject</button></th>

    		          </form> -->

    		        </tr>
    	        @endif

            @endforeach
        </table>

        </div>

	</div>
@endsection