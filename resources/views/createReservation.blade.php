@extends('layouts.app')

@section('content')
	
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">
	                	<h1>Ajouter une reservation</h1>
	                	
	                </div>

	                <div class="card-body" >

	                    <form method="get" action="/rooms" >
	                        @csrf
	                       	<!-- DATETIME PICKER -->
	                       		
	                       		
	                       		
	                       			
	                       			<div class="form-group row">
	                       			    <label for="name" class="col-md-4 col-form-label text-md-right">date de debut de l'evennement</label>
	                       			    <div class="col-md-6">
	                       			        <input class="form-control" type="text" name="dateStart" />
	                       			    </div>
	                       			</div>
	                       			<div class="form-group row">
	                       			    <label for="name" class="col-md-4 col-form-label text-md-right">date de fin de l'evennement</label>
	                       			    <div class="col-md-6">
	                       			        <input class="form-control" type="text" name="dateFinish" />
	                       			    </div>
	                       			</div>
	                       		
	                       		

	                       		
	                       	<!--  -->
	                        <div class="form-group row">
	                            <label for="name" class="col-md-4 col-form-label text-md-right">type de l'evennement</label>

	                            <div class="col-md-6">
	                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

	                                
	                            </div>
	                        </div>
	                        
	                        
	                        <!-- <div class="form-group row">
	                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('La demande') }}</label>

	                            <div class="col-md-6">
	                               <input type="file" name="file">
	                            </div>

	                        </div> -->

	                        <div class="form-group row mb-0">
	                            <div class="col-md-6 offset-md-4">
	                                <button type="submit" class="btn btn-primary">
	                                    {{ __('Confirmer') }}
	                                </button>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
</div>




<!-- <script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left',
    timePicker: true,
    timePicker24Hour: true,
    locale: {
    	format: 'YYYY-MM-DD hh:mm'
    }
  },function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD hh:mm') + ' to ' + end.format('YYYY-MM-DD hh:mm'));
  });
});
</script> -->

<script>
$(function() {
  $('input[name="dateStart"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10),
    timePicker: true,
    timePicker24Hour: true,
    locale: {
    	format: 'YYYY-MM-DD hh:mm'
    }
  }
  );
});
</script>

<script>
$(function() {
  $('input[name="dateFinish"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10),
    timePicker: true,
    timePicker24Hour: true,
    locale: {
    	format: 'YYYY-MM-DD hh:mm'
    }
  }
  );
});
</script>
@endsection