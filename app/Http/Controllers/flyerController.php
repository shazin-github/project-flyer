<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\AutherizesUser;

use \Validator;
use Illuminate\Http\Request;
use App\Flyer;
use App\Http\Requests;
use App\Http\Requests\FlyerRequest;
use App\Http\Requests\AddPhotoRequest;


use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Redirect;

use Session;
use Illuminate\Auth;

use App\User;



use App\Flyers_Photo;

class flyerController extends Controller
{

   // use AutherizesUser;


    public function __construct(){
        
        $this->middleware('auth', ['except' => ['show','store','AddPhoto']]);

        parent::__construct();

       
    }
   
    /**
     * Show the application Home Page.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

        
    }

    public function create(){

        
        
    	//flash('Success','Your Flyer has been Created','info');

        //flash()->success('Success',' Flyer Has been added');
    	
        return view('flyer.create');

    }

    /**
    *
    *@param FlyerRequest $resquest
    *
    */
    public function store(FlyerRequest $request){

        flash()->success('Success',' Flyer Has been added');

        $flyer =  $this->user->publish(

            new Flyer($request->all())

         );
        
        return redirect('flyer/'.$flyer->zip.'/'.$flyer->street);
    }

    

    public function show($zip , $street ){

        $flyer =  Flyer::locatedat($zip,$street);

        return view('flyer.show', compact('flyer'));
    }

    /**
    * @param \Request $request
    * 
    *
    *
     * @var \Illuminate\Session\SessionManager
     */

    public function AddPhoto($zip , $street,AddPhotoRequest $request  )

    {

        $photo  = Flyers_Photo::fromfile($request->file('file'));

        Flyer::locatedat($zip,$street)->AddPhoto($photo);

        // $photo = $this->makephoto($request->file('file'));

    }

    public function makephoto(UploadedFile $file)
    {

        return Flyers_Photo::named(
            
            $file->getClientOriginalName()

            )->move($file);

    }

}
