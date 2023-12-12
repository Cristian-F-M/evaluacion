<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    public function index()
    {
        $paises = DB::table("paises")->get();
        return $paises;
    }
}
