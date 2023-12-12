<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = DB::table("departamentos")->get();
        return $departamentos;
    }
}
