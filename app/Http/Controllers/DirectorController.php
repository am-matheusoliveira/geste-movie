<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    # BUSCA DOS REGISTROS
    public function index(Request $request, Director $director)
    {

        $result_director = $director->select_register($request);

        return view('director', compact('result_director'));
    }

    # INSERÇÃO DO REGISTRO
    public function director_insert(Request $request, Director $director)
    {
        $result_director = $director->insert_register($request);

        return $result_director;
    }

    # ATUALIZAÇÃO DO REGISTRO
    public function director_update(Request $request, Director $director)
    {
        $result_director = $director->update_register($request);

        return $result_director;        
    }

    # EXCLUSÃO DO REGISTRO
    public function director_delete(Request $request, Director $director)
    {
        $result_director = $director->delete_register($request);

        return $result_director;        
    }
}
