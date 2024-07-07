<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;
use PDOException;

class Genre extends Model
{
    use HasFactory;

    # BUSCA DOS REGISTROS
    public function select_register(Request $request)
    {
        $result_genre = DB::table('genre')->select('id_genre', 'name')->get();
        return $result_genre;
    }

    # INSERÇÃO DO REGISTRO
    public function insert_register(Request $request)
    {   
        $result_genre = DB::table('genre')->insertGetId(['name' => $request->input('genre_name')]);

        return 
            response()->json(
                array(
                    'id_genre' => $result_genre, 
                    'name' => $request->input('genre_name')
                ),
            200);

    }
    
    # ATUALIZAÇÃO DO REGISTRO
    public function update_register(Request $request)
    {
        $result_genre = DB::table('genre')->where('id_genre', $request->input('id_genre'))->update(['name' => $request->input('genre_name')]);
        return $result_genre;
    }

    # EXCLUSÃO DO REGISTRO
    public function delete_register(Request $request)
    {   

        $result_genre = DB::table('genre')->where('id_genre', '=', $request->input('id_genre'))->delete();
        return $result_genre;
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
