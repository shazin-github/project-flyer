<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $path = base_path();
        $directory = $path.'/abc';

        dd($directory);

        // Create a directory 

        //\File::makeDirectory($directory);

        $files = \File::files($directory);

        
        $content = array();
        

        foreach ($files as $value) {
            # code...
            $content[] = \File::get( $value );
        }

        dd($content[1]);

        return view('home');
    }
}
