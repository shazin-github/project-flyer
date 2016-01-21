<?php

namespace App\Http\Controllers\Traits;

use App\Flyer;
use Illuminate\Http\Request;

trait AutherizesUser{

	public function UserCreatedFlyer(Request $request){

        return Flyer::where([

            'zip'     => $request->zip,

            'street'  => $request->street,

            'user_id' => $this->user->id,

        ])->exists();
    }


    public function unauth(Request $request)
    {

        if($request->ajax()){

            return response(['You Are not Authorized' ], 403);

        }

        flash('No way');       

        return redirect('/');
    }
}
