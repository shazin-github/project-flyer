@extends('layout')

@section('container')

 <div class="jumbotron">
        <h1>Create Project Flyer</h1>
        <p>This is a template showcasing the optional theme stylesheet included in Bootstrap. Use it as a starting point to create something more unique by building on or modifying it.</p>
      

      @if(Auth::check())
        
        <a href="flyer/create" class='btn btn-primary'>Create New Flyer</a>
      
      @else
      	
      	<a href="login" class='btn btn-primary'>SignIn</a>
        <a href="register" class='btn btn-primary'>SignUp</a>
      
      @endif

      	
     
      </div>

@stop