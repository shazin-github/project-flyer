<?php


namespace App\http;
use Session;
use Illuminate\Http\Request;

class Flash{

	public function create($title , $message, $level){
		session()->flash('flash_message',[
			'title'   => $title,
			'message' => $message,
			'notice'  => $level
			]);
	} 

	public function message($title , $message  ){
		
		return $this->create($title , $message, 'info' );
	}
	public function success($title , $message ){

		return $this->create($title , $message, 'success' );
		
	}
	public function error($title , $message ){

		return $this->create($title , $message, 'error' );
		
	}
}