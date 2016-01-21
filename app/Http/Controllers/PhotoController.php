<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flyer;
use App\Http\Requests;
use App\Http\Requests\AddPhotoRequest;
use App\Http\Controllers\Controller;
use App\AddPhotoToFlyer;

class PhotoController extends Controller
{

	public function __construct(){

		$this->middleware('auth');

		parent::__construct();
	}

    /**
    *
    * Appay A photo to the reference to flyer
    *
    * @param string $zip 
    *
    * @param string $street
    *
    * @param AddPhotoRequest $resquest
    * 
    */
    public function store($zip , $street , AddPhotoRequest $resquest){

    	$flyer = Flyer::locatedat($zip,$street);

    	$photo = $resquest->file('file');

    	(new AddPhotoToFlyer($flyer,$photo))->save();

    }
}
