<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index()
    {
        $ciudadController = new CiudadController();
        $ciudades = $ciudadController->index();


        return view("welcome", ['ciudades' => $ciudades]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'fechaNacimiento' => ['required'],
            'documento' => ['required'],
            'ciudad' => ['required'],
        ]);


        User::create([
            'name' => $request->input('name'),
            'fechaNacimiento' => $request->input('fechaNacimiento'),
            'documentoIdentidad' => $request->input('documento'),
            'ciudad' => $request->input('ciudad_id'),
        ]);

        return to_route('home');

    }


    public function show()
    {

        $usuarios = DB::table("usuarios")->get();
        return view('index', ['usuarios' => $usuarios]);
    }


    public function delete(string $id)
    {
        User::find($id)->delete();
        return to_route('usuario.index');
    }

    public function update(Request $request, string $id)
    {

        $user = User::find($id);

        $request->validate([
            'name' => ['required'],
            'fechaNacimiento' => ['required'],
            'documento' => ['required'],
            'ciudad_id' => ['required'],
        ]);

        $user->update([
            'name' => $request->input('name'),
            'fechaNacimiento' => $request->input('fechaNacimiento'),
            'documentoIdentidad' => $request->input('documento'),
            'ciudad' => $request->input('ciudad_id'),

        ]);

        return to_route('usuario.index');
    }

}
