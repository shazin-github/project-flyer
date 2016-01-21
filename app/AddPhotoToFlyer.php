<?php

namespace App;

use App\Flyer;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Flyer_Photo;

class AddPhotoToFlyer

{
	protected $flyer;

	protected $file;

	public function __construct( Flyer $flyer ,  UploadedFile $file){

		$this->file  = $file;

		$this->flyer = $flyer;

	}

	public function save(){

		$photo  = Flyers_Photo::fromfile($this->file);

		$photos = $this->flyer->addPhoto($photo);

		$this->file->move($photos->baseDir(), $photos->name);


	}

	// public function makephoto(){

	// 	return new Flyer_Photo([
			
	// 		'name'=> $this->makefileName()
			
	// 		]);
	// }

	public function makefileName(){

		$name = sha1(

        	time().$this->file->getClientOriginalName()
        
        );
        
        $exe = $this->file->getClientOriginalExtension();

        return "{$name}.{$exe}";


	}


}