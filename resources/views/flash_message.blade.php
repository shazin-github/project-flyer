@if ( Session::get('flash_message') )
<script type="text/javascript">
  swal({   
  	title: "{{ session('flash_message.title')}}",
  	text: "{{ session('flash_message.message')}}",   
  	type: "{{ session('flash_message.notice')}}",   
  	timer: 1700,   
  	showConfirmButton: false
  	 });
</script>

@endif