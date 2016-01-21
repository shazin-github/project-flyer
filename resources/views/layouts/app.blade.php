<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Project Flyer</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.css">

</head>
<body>


  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <!--<div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>-->
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>


<script src="{{ asset('js/sweetalert-dev.js') }}" type="text/javascript"  ></script> 

@yield('script.footer')

@include('flash_message')
<!--<script type="text/javascript">
  swal({   title: "Error!",   text: "Here's my error message!",   type: "success",   confirmButtonText: "Cool" });
</script>-->
</body>
</html>