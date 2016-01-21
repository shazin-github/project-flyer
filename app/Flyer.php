<?php

namespace App;

use App\Flyers_Photo;
use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    //

	/**
    * Fillable fields for flyer
    * @var array
    */

	protected $fillable = [

		'street',
		'city',
		'state',
		'country',
		'zip',
		'price',
		'description',

	];

    /**
    *
    * @return Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function photos(){
    	
    	return $this->hasMany('App\Flyers_Photo');
    
    }

    public function Addphoto(Flyers_Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    /**
    *
    *A flyer is owned by a ser
    *
    *@return Illuminate\Database\Eloquent\Relations\BelongsTo
    *
    */
    public function owner(){

        return $this->belongsTo('App\user','user_id');
    }

    /**
    *
    * checkif the given user created the flyer
    * 
    * User $user
    *
    *@return boolean
    *
    */

    public function ownedBy(User $user){

        return $this->user_id == $user->id;
    }

    public static function locatedat($zip , $street){

        return Flyer::where(compact('zip', 'street'))->firstOrFail();

    }
}
