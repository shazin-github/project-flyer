<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\TestRepository;
use App\Forms\Contracts\RocketShipContract;

class TestController extends Controller
{
    // Constructor injection
	private $repository;

    public function __construct(TestRepository $repository){

    	$this->repository = $repository;

    }

    public function fooRepository(){

    	return $this->repository->get();
    }

    // method injection

    public function TestingRepository(TestRepository $repository){

    	return $repository->get();
    }


    // service Container
    public function index(){

    	$RB = \App::make('RoketLuncher');

    	//return $RB->blastoff();

    	$name = 'shazin-github';

    	$request = \App::make('guzzle');

    	$dat = $request->get("https://api.github.com/users/{$name}", array()); 

    	$res = $dat->send();

    	return $res->json();

    }
}
