<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Movie;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\GenreRequest;
use App\Http\Requests\MovieRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies=Movie::Movies();
        return view('pelicula.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres= Genre:: pluck('genre','id');
        return view('pelicula.create',compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Movie::create($request->all());
        return "Listo";
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
        //en el video de youtube usa el metod lists(), que esta deprecated, en la version 5.3 se usa pluck();
        
        $genres = Genre::pluck('genre', 'id');
        $datos= Movie::find($id);
        return view('pelicula.edit',['movie'=>$datos,'genres'=>$genres]);
        
        //return $id; retorna un numero...bien
        //return $genres; retorna un listado de los generos segun su id!!
        //reemplazo 'movie'=>$this->movie por 'movie'=>$id
        //CONCLUSION: debe encontrar la manera de reemplazar $this->movie, por los datos de la pelicula a editar segun el "ID" PASADO POR PARAMETRO
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
        $movie= Movie::find($id);
        $movie->fill($request->all());
        $movie->save();
        Session::flash('message', 'Película editada correctamente!');
        return Redirect::to('/pelicula');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie= Movie::find($id);
        $movie->delete();
        \Storage::delete($movie->path);
        Session::flash('message', 'Película eliminada correctamente!');
        return Redirect::to('/pelicula');
    }
}
