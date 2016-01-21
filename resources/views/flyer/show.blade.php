@extends('layout')

@section('container')

	<div class="row">
		<div class="col-md-4">
			<h1>{{ $flyer->street }}</h1>

			<h3>{{ $flyer->price }}</h3>


			<hr>

			<div class="description"> {!! nl2br($flyer->description) !!} </div>

		</div>
		<div class="col-md-8 gellery">
			
			@foreach ($flyer->photos->chunk(4) as $set)
				
				<div class="row">
				
				  @foreach($set as $photo  )
				
					<div class="col-md-3 gellery__image" >

						<img src="{{ url($photo->thumbnail_path) }}">
				  
					</div>

				  @endforeach	


				
				</div>	
			
			@endforeach

			
			
			@if( $user && $user->owns($flyer))
			
			<hr>
				<form id="addphotoform" 

					action="{{ $flyer->street }}/photos"

					method="POST"

					class="dropzone">
			
					{{ csrf_field() }}
			
				</form>

			@endif	

		</div>
	
	</div>

	

	

	<div class="row">
		
		

	</div>
			
	
@stop


@section('script.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js" type="text/javascript"></script>

<script>
	
	dropzone.options.addphotoform = {

		paramName: 'file',

		maxFilesize: 3,

		acceptedFiles: '.jpg , .jpeg , .png , .bmp ',

	};

</script>

@stop