<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\GenreRequest;
use Illuminate\Support\Facades\DB;

     
class GeneroController extends Controller
{

    /* "Implicit Binding" para laravel 5.2 o 5.3

    public function __construct(){

        $this->beforeFilter('@find',['only'=>['edit','update','destroy']]);
    }


    public function find(Route $route){

        $this->genre = Genre::find($route->getParameter('genero'));
    }*/


    /*public function listing(Request $request){

        $genres= Genre::all();
        //return response()->json($genres->toArray());

        if($request->ajax()){
          return response()->json(view('genero.index', compact('genres'))->render());
        }
    }*/



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$genres = Genre::all();
        $genres = DB::table('genres')->paginate(7);

        if ($request->ajax()) {
            return response()->json($genres);
            //return response()->json(view('genero.index', compact('genres'))->render());
        }

        if (!$request->ajax()) {
            return view('genero.index', compact('genres'));
        }
    }

    /*public function index(Request $request)
    {
        
        $genres = DB::table('genres')->paginate(8);

        if ($request->ajax()) {
            //return response()->json($genres);
            return response()->json(view('genero.index', compact('genres'))->render());
        }
        return view('genero.index',compact("genres"));
    }*/


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genero.create');
        if($request->ajax()){
            return "HOLAAA";
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreRequest $request)
    {
        if($request->ajax()){
            Genre::create($request->all());
            return response()->json([
                'mensaje'=> "Creado"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genres= Genre::find($id);

        return response()->json( $genres->toArray());
        //return view('genero.edit',compact("genres"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        $genre->fill($request->all());
        $genre->save();

        return response()->json(['mensaje' => 'Genero Actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Manejo de error en sql al tratar de eliminar un registro!!

        try {

            $genre = Genre::find($id);
            $genre->delete();
        }
        catch (\Illuminate\Database\QueryException $e){
            //return response()->json(["mensaje"=>$e->getMessage()]);
            //return false; funciona, pero no es lo mejor!!
            echo false;
        }
        
    }
}
