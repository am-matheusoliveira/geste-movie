<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    
    # BUSCA DOS REGISTROS
    public function index(Request $request, Actor $actor)
    {

        $result_actor = $actor->select_register($request);

        return view('actor', compact('result_actor'));
    }

    # INSERÇÃO DO REGISTRO
    public function actor_insert(Request $request, Actor $actor)
    {
        $result_actor = $actor->insert_register($request);

        return $result_actor;
    }

    # ATUALIZAÇÃO DO REGISTRO
    public function actor_update(Request $request, Actor $actor)
    {
        $result_actor = $actor->update_register($request);

        return $result_actor;
    }

    # EXCLUSÃO DO REGISTRO
    public function actor_delete(Request $request, Actor $actor)
    {
        $result_actor = $actor->delete_register($request);

        return $result_actor;
    }
}
