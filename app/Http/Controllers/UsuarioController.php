<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\FormRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
//use Illuminate\Routing\Route;

use Illuminate\Notifications\Notifiable;


class UsuarioController extends Controller
{

    /*
    public function __construct(){
        $this->beforeFilter('@find', ['only'=> ['edit', 'update', 'destroy']]);
    }

    !!! Ver este temas más adelante: "IMplicit Binding" para laravel 5.2 o 5.3

    https://www.youtube.com/playlist?list=PLIddmSRJEJ0vVsRFCSJQmLSiwPAIz3WlQ

    public function find(Route $route){
        $this->user= User::find($route->getParameter('usuario'));
        return $this->user;
    }
    */

    public function __construct(){

        $this->middleware('auth');
        $this->middleware('admin');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$users=User::All(); // Metodo All que captura todos los datos de la tabla
        $users=User::paginate(5); //para paginar los resultados, por parametros se pasa la cant. de elementos a ver
        //$users=User::onlyTrasehd->paginate(5); Muestra solo los registros eliminados

        if($request->ajax()){
        	return response()->json(view('usuario.users', compact('users'))->render());
        }
        
        return view('usuario.index',compact("users"));    //se le pasa como param. la var. $users
        //compact pasa los datos de una BBDD a un array con el nombre users.

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)  
    {
        //return "ESTOY AQUI!!";
       /* User::create([
            'name'=> $request['name'],
            'email'=> $request['email'],
            //'password'=> bcrypt($request['password']), ya no es necesaria la func bcrypt porque esto se resuelve en el Model
            'password'=> $request['password'],
            ]);
            Comento toda esta sección porque se puede optimizar el código ... código siguiente..*/

        User::create($request->all());
        //return redirect('/usuario')->with('message','store');
        Session::flash('message','Usuario creado correctamente');
        return Redirect::to('/usuario');
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
        $user= User::find($id); //find().....Obtener un registro por su clave primaria

        return view('usuario.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user= User::find($id);
        $user->fill($request->all());
        $user->save();
        Session::flash('message','Usuario editado correctamente');
        return Redirect::to('/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //User::destroy($id); //destruye el recurso
        $user=User::find($id);
        $user->delete();
        Session::flash('message','Usuario eliminado correctamente');

        return Redirect::to('/usuario');
    }
}
