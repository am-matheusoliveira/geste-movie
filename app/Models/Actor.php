<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;
use PDOException;

class Actor extends Model
{
    use HasFactory;

    # BUSCA DOS REGISTROS
    public function select_register(Request $request)
    {
        $result_actor = DB::table('actor')->select(
                            'id_actor', 
                            'full_name', 
                            'birth_date',
                            DB::raw("CONCAT(TIMESTAMPDIFF(YEAR, birth_date, CURDATE()), ' (anos)') AS age")
                        )->get();
        return $result_actor;
    }

    # INSERÇÃO DO REGISTRO
    public function insert_register(Request $request)
    {
        
        // CONVERTENDO A DATA PARA O FORMATO YYYY-MM-DD
        $data_usa = implode("-", array_reverse(explode("/", $request->input('actor_birth_date'))));

        $result_actor = DB::table('actor')->insertGetId(['full_name' => $request->input('actor_full_name'), 'birth_date' => $data_usa]);
        
        // CALCULANDO A IDADE DO ATOR
        $age = date_diff(date_create($data_usa), date_create('now'))->y;

        // RETORNANDO OS DADOS VIA JSON
        return 
            response()->json(
                array(
                    'id_actor' => $result_actor, 
                    'full_name' => $request->input('actor_full_name'),
                    'birth_date' => $request->input('actor_birth_date'),
                    'age' => $age.' (anos)'
                ),
            200);
    }
    
    # ATUALIZAÇÃO DO REGISTRO
    public function update_register(Request $request)
    {
        // CONVERTENDO A DATA PARA O FORMATO YYYY-MM-DD
        $data_usa = implode("-", array_reverse(explode("/", $request->input('actor_birth_date'))));

        $result_actor = DB::table('actor')->where('id_actor', $request->input('id_actor'))->update(['full_name' => $request->input('actor_full_name'), 'birth_date' => $data_usa]);
        return $result_actor;
    }

    # EXCLUSÃO DO REGISTRO
    public function delete_register(Request $request)
    {
        $result_actor = DB::table('actor')->where('id_actor', '=', $request->input('id_actor'))->delete();
        return $result_actor;
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
