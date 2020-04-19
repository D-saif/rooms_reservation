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

	                    <form method="POST" action="reservations/store">
	                        @csrf
	                       	<!-- DATETIME PICKER -->
	                       		
	                       		
	                       		
	                       			
	                       			<div class="form-group row">
	                       			    <label for="name" class="col-md-4 col-form-label text-md-right">periode de l'evennement</label>

	                       			    <div class="col-md-6">
	                       			        <input type="text" name="datetimes" class="form-control" />

	                       			        <!--  -->
	                       			    </div>
	                       			</div>
	                       			
	                       		
	                       		

	                       		
	                       	<!--  -->
	                        <div class="form-group row">
	                            <label for="name" class="col-md-4 col-form-label text-md-right">type de l'evennement</label>

	                            <div class="col-md-6">
	                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

	                                
	                            </div>
	                        </div>
	                        
	                        
	                        <div class="form-group row">
	                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</label>

	                            <div class="col-md-6">
	                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
	                            </div>
	                        </div>

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




<script>
$(function() {
  $('input[name="datetimes"]').daterangepicker({
    timePicker: true,
    startDate: moment().startOf('hour'),
    endDate: moment().startOf('hour').add(32, 'hour'),
    locale: {
      format: 'M/DD hh:mm A'
    }
  });
});
</script>
@endsection