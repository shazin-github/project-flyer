<?php 

function flash($title= null ,$message = null ){

	$flash = app('App\http\Flash');

	if(func_num_args() == 0 ){

		return $flash;
	
	}

	return $flash->message($title,$message );

	//return session()->flash('flash_message', $message);  // that can be use 
}

?>