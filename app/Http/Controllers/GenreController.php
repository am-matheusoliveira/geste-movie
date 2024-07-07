<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    # BUSCA DOS REGISTROS
    public function index(Request $request, Genre $genre)
    {

        $result_genre = $genre->select_register($request);

        return view('genre', compact('result_genre'));

    }

    # INSERÇÃO DO REGISTRO
    public function genre_insert(Request $request, Genre $genre)
    {   

        $result_genre = $genre->insert_register($request);

        return $result_genre;       
    }
    
    # ATUALIZAÇÃO DO REGISTRO
    public function genre_update(Request $request, Genre $genre)
    {

        $result_genre = $genre->update_register($request);
        
        return $result_genre;
    }

    # EXCLUSÃO DO REGISTRO
    public function genre_delete(Request $request, Genre $genre)
    {
        
        $result_genre = $genre->delete_register($request);
        
        return $result_genre;
    }    
}
