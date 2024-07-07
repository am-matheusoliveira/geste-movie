<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use App\Models\Director;
use App\Models\Genre;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MovieController extends Controller
{
    
    /*------------------------------------------------------------------DataTables Session-----------------------------------------------------------------------*/
    # BUSCA DOS REGISTROS
    public function data_tables_movie(Request $request, Movie $movie)
    {
        $result_movie = $movie->data_tables_select_register($request);

        // DADOS DO DIRETOR
        $result_director = new Director();
        $director_register = $result_director->select_register($request);
        
        // DADOS DO GÊNERO
        $result_genre = new Genre();
        $genre_register = $result_genre->select_register($request);
        
        // DADOS DO ATOR
        $result_actor = new Actor();
        $actor_register = $result_actor->select_register($request);        

        return view('data_tables_movie', compact('result_movie', 'director_register', 'genre_register', 'actor_register'));
    }

    public function data_tables_movie_list(Request $request, Movie $movie){
        if ($request->ajax()) {
            
            $result_movie = $movie->data_tables_select_register($request);            

            return Datatables::of($result_movie)
                // ->addIndexColumn() // ADD UMA COLUNA COMO COLUNA INDICE DA TABELA IGUAL E FEITO NO DBGRID DELPHI
                ->addColumn('description', function($row) {
                    $descriptionBtn = '
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#movie_modal_description'.$row->movie_id_movie.'">Descrição</button>
                                                        
                            <!-- MODAL ONDE SERA MOSTRADA A DESCRIÇÃO DE CADA FILME -->
                             
                            <div class="modal fade" id="movie_modal_description'.$row->movie_id_movie.'" tabindex="-1" aria-labelledby="movie_modal_description_label" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="movie_modal_description_label">Descrição</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" maxlength="500" readonly>'.$row->description.'</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';                    

                    return $descriptionBtn;                    
                })->addColumn('actor_name', function($row) {
                    
                    $actorBtn = ' 
                            <button type="button" class="btn btn-primary btn-sm btn-list-actor-movie" data-bs-toggle="modal" data-bs-target="#staticBackdropListActor">Atore(s)</button> 

                            <!-- MODAL PARA LISTAGEM DOS ATORES -->
                            <div class="modal" id="staticBackdropListActor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelListActor" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabelListActor">Atores do Filme: ?????</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped" id="actor_movie_list">
                                                <thead>
                                                    <th>ID</th>
                                                    <th>Ator</th>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- MODAL PARA LISTAGEM DOS ATORES -->                        
                    
                        ';
                    
                    return $actorBtn;
                })
                ->addColumn('action', function($row) {

                    $actionBtn = '
                            <button class="btn btn-sm btn-danger delete-register" data-bs-toggle="modal" data-bs-target="#staticBackdropDelete">Excluir</button>
                            <button class="btn btn-sm btn-warning btn-insert-or-update" data-bs-toggle="modal" data-bs-target="#staticBackdropInsertUpdate">Editar</button>
                        ';

                    return $actionBtn;
                })
                ->rawColumns(['action', 'description', 'actor_name'])->make(true);
        }
    }
    /*------------------------------------------------------------------DataTables Session-----------------------------------------------------------------------*/

    # BUSCA DOS REGISTROS
    public function index(Request $request, Movie $movie)
    {
        $result_movie = $movie->select_register($request);

        // DADOS DO DIRETOR
        $result_director = new Director();
        $director_register = $result_director->select_register($request);
        
        // DADOS DO GÊNERO
        $result_genre = new Genre();
        $genre_register = $result_genre->select_register($request);
        
        // DADOS DO ATOR
        $result_actor = new Actor();
        $actor_register = $result_actor->select_register($request);        

        return view('movie', compact('result_movie', 'director_register', 'genre_register', 'actor_register'));
    }

    # INSERÇÃO DO REGISTRO
    public function movie_insert(Request $request, Movie $movie)
    {
        $result_movie = $movie->insert_register($request);       

        return $result_movie;
    }

    # ATUALIZAÇÃO DO REGISTRO
    public function movie_update(Request $request, Movie $movie)
    {
        $result_movie = $movie->update_register($request);

        return $result_movie;
    }

    # EXCLUSÃO DO REGISTRO
    public function movie_delete(Request $request, Movie $movie)
    {
        $result_movie = $movie->delete_register($request);

        return $result_movie;
    }

    # BUSCAR OS GÊNEROS DE UM FILME
    public function movie_list_genre(Request $request, Movie $movie){
        $result_movie_list_genre = $movie->movie_list_genre($request);
        
        return $result_movie_list_genre;
    }

    # BUSCAR OS ATORES DE UM FILME
    public function movie_list_actor(Request $request, Movie $movie){
        $result_movie_list_actor = $movie->movie_list_actor($request);

        return $result_movie_list_actor;
    }    

    # BUSCA: genre_movie
    public function genre_movie_index(Request $request, Movie $movie)
    {
        $result_genre_movie = $movie->gm_select_register($request);

        return $result_genre_movie;
    }

    # INSERÇÃO: genre_movie
    public function genre_movie_insert(Request $request, Movie $movie)
    {
        $result_genre_movie = $movie->gm_insert_register($request);

        return $result_genre_movie;
    }

    # ATUALIZAÇÃO: genre_movie
    public function genre_movie_update(Request $request, Movie $movie)
    {
        $result_genre_movie = $movie->gm_update_register($request);

        return $result_genre_movie;
    }

    # EXCLUSÃO: genre_movie
    public function genre_movie_delete(Request $request, Movie $movie)
    {
        $result_genre_movie = $movie->gm_delete_register($request);

        return $result_genre_movie;
    }
    
    # BUSCA: actor_movie
    public function actor_movie_index(Request $request, Movie $movie)
    {
        $result_actor_movie = $movie->am_select_register($request);

        return $result_actor_movie;
    }

    # INSERÇÃO: actor_movie
    public function actor_movie_insert(Request $request, Movie $movie)
    {
        $result_actor_movie = $movie->am_insert_register($request);

        return $result_actor_movie;
    }

    # ATUALIZAÇÃO: actor_movie
    public function actor_movie_update(Request $request, Movie $movie)
    {
        $result_actor_movie = $movie->am_update_register($request);

        return $result_actor_movie;
    }

    # EXCLUSÃO: actor_movie
    public function actor_movie_delete(Request $request, Movie $movie)
    {
        $result_actor_movie = $movie->am_delete_register($request);

        return $result_actor_movie;
    }    
}
