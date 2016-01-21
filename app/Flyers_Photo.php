<?php

namespace App;

use Symfony\Component\HttpFoundation\File\UploadedFile;

use Illuminate\Database\Eloquent\Model;

use Image;

class Flyers_Photo extends Model
{
    //

    protected $file;


    protected $table = 'flyers_photos';
    
    protected $fillable = ['path' , 'name' , 'thumbnail_path']; 


    protected static function boot()
    {

        static::creating(function($photo){

            return $photo->upload();

        });

    }

    public function flyers(){

    	return $this->belongsTo('App\Flyer');
    }

    /**
     * buil new photo instance.
     *
     *@param string $name
     *
     * @return self
     */

    public static function named( $name )
    {

    	return (new static)->saveAs($name);
    
    }

    public static function fromfile(UploadedFile $file){

        $photo = new static;

        $photo->file = $file;

        return $photo->fill([

            'name' => $photo->filename(),
           
            'path' => $photo->filepath(),
           
            'thumbnail_path' => $photo->thumbnailpath()

        ]);

    }

    public function filename(){

        $name = sha1(

           time().$this->file->getClientOriginalName()
        
        );
        
        $exe = $this->file->getClientOriginalExtension();

        return "{$name}.{$exe}";
    }

    public function filepath(){

        return $this->baseDir() . '/' . $this->filename();

    }

    public function thumbnailpath(){

        return $this->baseDir() . '/tn-' . $this->filename();

    }

    public function baseDir(){

        return "img/photos";

    }

    // public static function setNameAttribute($name){

    //     $this->Attributes['name'] = $name;

    //     $this->path = $this->baseDir() . '/' . $this->filename();

    //     $this->thumbnail_path = $this->baseDir() . '/tn-' . $this->filename();
    // } 

    public function upload()
    {

    	$this->file->move($this->baseDir(), $this->filename());

    	$this->makethumbnail();

    	return $this;

    }

    public function makethumbnail(){

        Image::make($this->filepath())
            
            ->fit(200)
            
            ->save($this->thumbnailpath());
    }



}
