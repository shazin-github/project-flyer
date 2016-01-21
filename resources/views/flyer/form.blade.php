
	{{ csrf_field() }}

	
	<div class="form-group" >
		<label for="street" >Street:</label>
		<input type="text" id="street" class="form-control" name="street" value="{{ old('street') }}" required >
	</div>

	<div class="form-group" >
		<label for="city" >City:</label>
		<input type="text" id="city" class="form-control" name="city" value="{{ old('city') }}" required >
	</div>

	<div class="form-group" >
		<label for="zip" >Postal Code/Zip:</label>
		<input type="text" id="zip" class="form-control" name="zip" value="{{ old('zip') }}" required >
	</div>

	<div class="form-group" >
		<label for="country" >Country:</label>
		
		<select id="country" class="form-control" name="country">
			@foreach (App\http\utilities\Country::All() as $key => $value )
			<option value="{{ $value}}" > {{ $key }} </option>
			@endforeach
		</select>
	</div>

	<div class="form-group" >
		<label for="state" >State:</label>
		<input type="text" id="state" class="form-control" name="state" value="{{ old('state') }}" required >
	</div>

	<div class="form-group" >
		<label for="price" >Home Price:</label>
		<input type="text" id="price" class="form-control" name="price" value="{{ old('price') }}" required >
	</div>

	<div class="form-group" >
		<label for="description" >Home Description:</label>
		<textarea id="description" class="form-control" name="description" value="{{ old('description') }}" required ></textarea>
	</div>

	<!--<div class="form-group" >
		<label for="photo" >Home Image:</label>
		<input type="file" id="photo" class="form-control" name="photo" value="{{ old('image') }}"  >
	</div>-->

	<div class="form-group" >
		<button type="submit" class="btn btn-primary">Create Flyer</button>
	</div>
