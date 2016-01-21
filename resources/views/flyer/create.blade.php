@extends('layout')

@section('container')

<h1>Selling Yourr Home ??</h1>
<hr>
<div class="row">
	<form method="POST" action="store" enctype="multipart/form-data" class="col-md-6" >
		
		
			
		@include('flyer.form')

		@if( count($errors) > 0 )

			<div class="alert alert-danger">
				
				<ul>
				
					@foreach($errors->all() as $error)
				
						<li>{{ $error }}</li>
				
					@endforeach
				
				</ul>	
			
			</div>
		
		@endif

	</form>	
</div>
@stop