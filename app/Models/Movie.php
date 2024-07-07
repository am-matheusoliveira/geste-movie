<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use PDOException;

class Movie extends Model
{
    use HasFactory;
    
    # BUSCA DOS REGISTROS - DataTAbles
    public function data_tables_select_register(Request $request)
    {   
        $result_data_tables_movie = DB::table('movie')
                            ->join('director', 'movie.id_director',       '=', 'director.id_director')

                            ->leftJoin('genre_movie', 'movie.id_movie',       '=', 'genre_movie.id_movie')
                            ->leftJoin('genre',       'genre_movie.id_genre', '=', 'genre.id_genre')

                            // ->leftJoin('actor_movie', 'movie.id_movie', '=', 'actor_movie.id_movie')
                            // ->leftJoin('actor',       'actor_movie.id_actor', '=', 'actor.id_actor')

                            ->select(
                                'movie.id_movie as movie_id_movie',
                                'movie.title', 
                                'movie.description', 
                                'movie.release_year',

                                // 'movie.duration',
                                DB::raw("concat(movie.duration, ' Minutos') as duration"),

                                // 'movie.age_rating',
                                DB::raw("concat(movie.age_rating, ' Anos') as age_rating"),                                

                                'movie.id_director', 
                                'director.full_name as director_name',
                                // 'actor.full_name as actor_name', 
                                'genre.name as genre_name', 
                            )
                            ->get();
        return $result_data_tables_movie;
    }

    // BUSCAR REGISTRO PELO ID
    public function select_row($id_register){
        $result_movie = DB::table('movie')
                            ->join('director', 'movie.id_director', '=', 'director.id_director')
                            ->where('movie.id_movie', $id_register)
                            ->select(
                                'movie.id_movie as movie_id_movie',
                                'movie.title', 
                                'movie.description', 
                                'movie.release_year',                                
                                // DB::raw("concat(movie.duration, ' Minutos') as duration"),
                                // DB::raw("concat(movie.age_rating, ' Anos') as age_rating"),
                                'movie.duration',
                                'movie.age_rating',
                                'movie.id_director',
                                'director.full_name as director_name', 
                            )
                            ->get();
        return $result_movie;
    }
    
    # BUSCA DOS REGISTROS
    public function select_register(Request $request)
    {   

        $result_movie = DB::table('movie')
                            ->join('director', 'movie.id_director', '=', 'director.id_director')
                            ->select(                                
                                'movie.id_movie as movie_id_movie',
                                'movie.title', 
                                'movie.description', 
                                'movie.release_year',                                 
                                // DB::raw("concat(movie.duration  , ' Minutos') as duration"),
                                // DB::raw("concat(movie.age_rating, ' Anos') as age_rating"),
                                'movie.duration',
                                'movie.age_rating',
                                'movie.id_director', 
                                'director.full_name as director_name', 
                            )
                            ->get();
        return $result_movie;
    }

    # INSERÇÃO DO REGISTRO
    public function insert_register(Request $request)
    {

        $result_movie = DB::table('movie')->insertGetId([        
            'title'         => $request->input('movie_title'),
            'description'   => $request->input('movie_description'),
            'release_year'  => $request->input('movie_release_year'),
            'duration'      => $request->input('movie_duration'),
            'age_rating'    => $request->input('movie_age_rating'),
            'id_director'   => $request->input('movie_id_director'),
            'usu_insert'    => Auth::user()->id,
            'usu_update'    => Auth::user()->id,
            'dt_update'     => date("Y-m-d H:i:s")
        ]);

        // BUCANDO OS DADOS DO NOVO REGISTRO
        $register_movie = $this->select_row($result_movie);
        
        // RETORNANDO OS DADOS EM FORMATO JSON
        return response()->json(array(
            'movie_id_movie' => $register_movie[0]->movie_id_movie,
            'title'          => $register_movie[0]->title,
            'description'    => $register_movie[0]->description,
            'release_year'   => $register_movie[0]->release_year,
            'duration'       => $register_movie[0]->duration,
            'age_rating'     => $register_movie[0]->age_rating,
            'id_director'    => $register_movie[0]->id_director,
            'director_name'  => $register_movie[0]->director_name,
        ), 200);
    }
    
    # ATUALIZAÇÃO DO REGISTRO
    public function update_register(Request $request)
    {
        $result_movie = DB::table('movie')->where('id_movie', $request->input('movie_id_movie'))->update([            
            'title'         => $request->input('movie_title'),
            'description'   => $request->input('movie_description'),
            'release_year'  => $request->input('movie_release_year'),
            'duration'      => $request->input('movie_duration'),
            'age_rating'    => $request->input('movie_age_rating'),
            'id_director'   => $request->input('movie_id_director'),
            'usu_update'    => Auth::user()->id,
            'dt_update'     => date("Y-m-d H:i:s")
        ]);

        return $result_movie;
    }

    # EXCLUSÃO DO REGISTRO
    public function delete_register(Request $request)
    {
        $result_movie = DB::table('movie')->where('id_movie', '=', $request->input('movie_id_movie'))->delete();
        return $result_movie;        
    }

    # BUSCANDO A LISTA DE GÊNEROS DO FILME
    public function movie_list_genre(Request $request)
    {
        $result_movie_list_genre = DB::table('genre_movie')
                                        ->join('genre', 'genre_movie.id_genre', '=', 'genre.id_genre')
                                        ->where('genre_movie.id_movie', $request->input('id_movie'))
                                        ->select('genre.id_genre', 'genre.name')
                                        ->get();
        return $result_movie_list_genre;
    }
    
    # BUSCANDO A LISTA DE ATORES DO FILME
    public function movie_list_actor(Request $request)
    {
        $result_movie_list_actor = DB::table('actor_movie')
                                        ->join('actor', 'actor_movie.id_actor', '=', 'actor.id_actor')
                                        ->where('actor_movie.id_movie', $request->input('id_movie'))
                                        ->select('actor.id_actor', 'actor.full_name')
                                        ->get();
        return $result_movie_list_actor;
    }        
    
    // BUSCAR REGISTRO PELO ID - GENRE
    public function select_row_genre_movie($id_register){
        $result_genre_movie = DB::table('genre_movie')
                            ->join('genre', 'genre_movie.id_genre', '=', 'genre.id_genre')
                            ->where('genre_movie.id_genre_movie', $id_register)
                            ->select(
                                'genre_movie.id_genre_movie',
                                'genre_movie.id_genre', 
                                'genre.name',
                            )
                            ->get();
        return $result_genre_movie;
    }

    # BUSCA: genre_movie
    public function gm_select_register(Request $request)
    {

        $result_genre_movie = DB::table('genre_movie')
                            ->join('genre', 'genre_movie.id_genre', '=', 'genre.id_genre')
                            ->where('genre_movie.id_movie', $request->input('id_movie'))
                            ->select(
                                'genre_movie.id_genre_movie',
                                'genre_movie.id_genre', 
                                'genre_movie.id_movie',
                                'genre.name',
                            )
                            ->get();
        return $result_genre_movie;

    }

    # INSERÇÃO: genre_movie
    public function gm_insert_register(Request $request)
    {
        $result_genre_movie = DB::table('genre_movie')->insertGetId([        
            'id_genre' => $request->input('id_genre'),
            'id_movie' => $request->input('id_movie'),
        ]);
        
        $register_genre_movie = $this->select_row_genre_movie($result_genre_movie);
        
        return response()->json(array(
            'id_genre_movie' => $register_genre_movie[0]->id_genre_movie,
            'id_genre'       => $register_genre_movie[0]->id_genre,
            'name'           => $register_genre_movie[0]->name,
        ), 200);
    }
    
    # ATUALIZAÇÃO: genre_movie
    public function gm_update_register(Request $request)
    {
        $result_genre_movie = DB::table('genre_movie')->where('id_genre_movie', $request->input('id_genre_movie'))->update([
            'id_genre' => $request->input('id_genre')
        ]);

        return $result_genre_movie;
    }

    # EXCLUSÃO: genre_movie
    public function gm_delete_register(Request $request)
    {
        $result_genre_movie = DB::table('genre_movie')->where('id_genre_movie', '=', $request->input('id_genre_movie'))->delete();
        return $result_genre_movie; 
    } 
    
    // BUSCAR REGISTRO PELO ID - ACTOR
    public function select_row_actor_movie($id_register){
        $result_actor_movie = DB::table('actor_movie')
                            ->join('actor', 'actor_movie.id_actor', '=', 'actor.id_actor')
                            ->where('actor_movie.id_actor_movie', $id_register)
                            ->select(
                                'actor_movie.id_actor_movie',
                                'actor_movie.id_actor', 
                                'actor.full_name',
                            )
                            ->get();
        return $result_actor_movie;
    }

    # BUSCA: actor_movie
    public function am_select_register(Request $request)
    {

        $result_actor_movie = DB::table('actor_movie')
                            ->join('actor', 'actor_movie.id_actor', '=', 'actor.id_actor')
                            ->where('actor_movie.id_movie', $request->input('id_movie'))
                            ->select(
                                'actor_movie.id_actor_movie',
                                'actor_movie.id_actor', 
                                'actor_movie.id_movie',
                                'actor.full_name',
                            )
                            ->get();
        return $result_actor_movie;        
    }

    # INSERÇÃO: actor_movie
    public function am_insert_register(Request $request)
    {
        $result_actor_movie = DB::table('actor_movie')->insertGetId([        
            'id_actor' => $request->input('id_actor'),
            'id_movie' => $request->input('id_movie'),
        ]);
        
        $register_actor_movie = $this->select_row_actor_movie($result_actor_movie);
        
        return response()->json(array(
            'id_actor_movie' => $register_actor_movie[0]->id_actor_movie,
            'id_actor'       => $register_actor_movie[0]->id_actor,
            'full_name'      => $register_actor_movie[0]->full_name,
        ), 200);
    }
    
    # ATUALIZAÇÃO: actor_movie
    public function am_update_register(Request $request)
    {
        $result_actor_movie = DB::table('actor_movie')->where('id_actor_movie', $request->input('id_actor_movie'))->update([
            'id_actor' => $request->input('id_actor')
        ]);

        return $result_actor_movie;
    }

    # EXCLUSÃO: actor_movie
    public function am_delete_register(Request $request)
    {
        $result_actor_movie = DB::table('actor_movie')->where('id_actor_movie', '=', $request->input('id_actor_movie'))->delete();
        return $result_actor_movie; 
    }

    # MENSAGENS: ERRO OU SUCESSO NA EXECUÇÃO DO COMANDO SQL
    public function database_message($message, $statement)
    {   
        # INSERT
        if($message === 'insert' && $statement === true){
            
            return json_encode('Sucesso: Registro cadastrado com sucesso!');

        }else if($message === 'insert' && $statement === false){
            
            return json_encode('Sucesso: Registro cadastrado com sucesso!');
        }

        # UPDATE
        if($message === 'update' && $statement === true){
            
            return json_encode('Sucesso: Registro cadastrado com sucesso!');

        }else if($message === 'update' && $statement === false){
            
            return json_encode('Sucesso: Registro cadastrado com sucesso!');
        }
        
        # DELETE
        if($message === 'delete' && $statement === true){
            
            return json_encode('Sucesso: Registro cadastrado com sucesso!');

        }else if($message === 'delete' && $statement === true){
            
            return json_encode('Sucesso: Registro cadastrado com sucesso!');
        }
    }

    # TRATAMENTO DE EXCEÇÕES DO BANCO DE DADOS
    public function try_catch($command, $execute_resp)
    {
        try{

            //

        }catch(Exception $erro){

            echo(json_encode('Erro: '));
            exit;

        }catch(PDOException $e){

            echo(json_encode('Erro: '));
                                
            exit;

        }finally{

            echo(json_encode('Sucesso: '));
        }            
    }
}
