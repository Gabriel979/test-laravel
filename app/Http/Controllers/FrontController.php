<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{

	public function __construct(){
		$this->middleware('auth', ['only'=>'admin']); //para que solo se aplique a la ruta "admin"

	}



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }


    public function contacto(){

        return view('contacto');
    }
    

    public function reviews(){

        $movies=Movie::Movies();
        return view('reviews',compact('movies'));
    }

    public function admin(){

        return view('admin.index');
    }
}
