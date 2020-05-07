@extends('layouts.app')
@section('content')
	<div class="container">
		<h4>La salle {{ $id_room }} est occupée dans les periodes suivantes:</h4>
		@foreach($occupied_time as $occ_time)
			<ul>
				<li>De {{ $occ_time->date_time_start }} à {{ $occ_time->date_time_finish }}</li>
			</ul>
			
		@endforeach
	</div>
@endsection