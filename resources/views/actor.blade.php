@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    <div class="card-header">
                        <strong>{{ __('Atores') }}</strong>                     
                    </div>

                    <div class="card-body">                    

                        <div class="card-body d-flex justify-content-between">
                            <a href="{{ url('/home') }}" class="btn btn-sm btn-primary">Retornar</a>
                            <a href="{{ url('/actor') }}" class="btn btn-sm btn-primary btn-insert-or-update" data-bs-toggle="modal" data-bs-target="#staticBackdropInsertUpdate">Novo Registro</a>
                            
                        </div>

                        <div class="card p-2">                        
                            <div class="card-header">
                                <strong>Atores</strong>
                            </div>

                            @if (count($result_actor) > 0)
                                <table class="table table-striped" id="principal-table">
                                    <thead>
                                        <th>ID</th>
                                        <th>Nome Completo</th>
                                        <th>DT / Nascimento</th>
                                        <th class="text-center">Ações</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($result_actor as $result_actor)
                                            <tr data-registro="{{ $result_actor->id_actor }}">
                                                <td>{{ $result_actor->id_actor }}</td>
                                                <td>{{ $result_actor->full_name }}</td>
                                                <td>{{ date("d/m/Y", strtotime($result_actor->birth_date)) }}</td>                                                
                                                <td class="text-center" style="width: 200px !important;">
                                                    <button class="btn btn-sm btn-danger delete-register" data-bs-toggle="modal" data-bs-target="#staticBackdropDelete">Excluir</button>
                                                    <button class="btn btn-sm btn-warning btn-insert-or-update" data-bs-toggle="modal" data-bs-target="#staticBackdropInsertUpdate">Editar</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                            <!-- MODAL PARA CRIAÇÃO E EDIÇÃO DOS REGISTROS -->
                            <div class="modal" id="staticBackdropInsertUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelInsertUpdate" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabelInsertUpdate">Novo Registro</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="modal-body">               
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="actor_full_name">Nome do Ator:</label>
                                                        <input type="text" class="form-control" id="actor_full_name" name="actor_full_name" placeholder="" required maxlength="100">
                                                        
                                                        <label for="actor_birth_date">Aniversário:</label>
                                                        <input type="text" class="form-control mask_date" id="actor_birth_date" name="actor_birth_date" placeholder="dd/mm/yyyy" required maxlength="10">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary insert-or-update" data-bs-dismiss="modal">?????</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- FIM DO MODAL PARA CRIAÇÃO E EDIÇÃO DOS REGISTROS -->

                            <!-- MODAL PARA EXCLUSÃO DOS REGISTROS -->
                            <div class="modal" id="staticBackdropDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelDelete" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabelDelete">Excluir Registro</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Tem certeza que deseja excluir este registro ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                        <button type="button" class="btn btn-primary" id="delete-action" data-bs-dismiss="modal">Sim</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- FIM DO MODAL PARA EXCLUSÃO DOS REGISTROS -->
                        </div>                                       
                    </div>                 
                </div>
            </div>
        </div>
    </div>        
@endsection



@section('footer')    

    <script>
        $(document).ready(function(event){

            // LINHA QUE FOI CLICADA NA TABELA
            var rowTable = null;

            // DEFINIÇÃO DO CABEÇALHO PADRÃO PARA AS REQUISIÇÕES HTTP
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            // -------------------------------- DELETE -------------------------------//
            // MODAL DELETE
            $(document).on('click', '.delete-register', function(event){
                
                // SALVANDO A LINHA DA TABELA
                rowTable = event.target.closest("tr");

            });

            // AÇÃO EXECUTADA - EXCLUSÃO
            $('#delete-action').click(function(){
                
                // CHAMANDO A FUNÇÃO PARA EXCLUIR O REGISTRO
                delete_register($(rowTable).data('registro'));

                // REMOVENDO LINHA DA TABELA HTML
                rowTable.remove();
                
            });

            // ENVIAR A EXCLUSÃO DO REGISTRO PARA O SERVIDOR
            function delete_register(id_actor){
                
                // ENVIANDO A REQUISIÇÃO HTTP                  
                $.ajax({
                    url: "{{ route('actor_delete') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        id_actor: id_actor
                    },
                    success: function(response) {
                        if(response.length == 0){
                            console.log(response);
                        }
                    }
                });                
            }
            
            // -------------------- MODAL PARA INSERT ou UPDATE --------------------/
            $(document).on('click', '.btn-insert-or-update', function(event){
                
                if(event.target.textContent === 'Novo Registro'){

                    // CONFIGURAÇÃO: Novo Registro
                    $('#staticBackdropLabelInsertUpdate').html("Novo Registro");
                    $('.insert-or-update').html("Salvar");

                    // LIMPANDO O INPUT
                    $('#actor_full_name').val('');
                    $('#actor_birth_date').val('');

                }else if(event.target.textContent === 'Editar'){                                        

                    // SALVANDO A LINHA DA TABELA
                    rowTable = event.target.closest("tr");

                    // CONFIGURAÇÃO: Editar Registro
                    $('#staticBackdropLabelInsertUpdate').html("Editar Registro");
                    $('.insert-or-update').html("Editar");

                    // PEGANDO O VALOR DA COLUNA DA LINHA E COLOCANDO NO INPUT
                    $('#actor_full_name').val(rowTable.cells[1].innerText);
                    $('#actor_birth_date').val(rowTable.cells[2].innerText);
                }
            });            
            
            // -------------------- AÇÃO EXECUTADA - INSERÇÃO ou ATUALIZAÇÃO --------------------/
            $('.insert-or-update').click(function(event){                                

                if(event.target.textContent === 'Editar'){

                    // PEGANDO O VALOR DO INPUT E COLOCANDO NA COLUNA DA LINHA
                    rowTable.cells[1].innerText = $('#actor_full_name').val();                
                    rowTable.cells[2].innerText = $('#actor_birth_date').val();                

                    // CHAMANDO A FUNÇÃO PARA ATUALIZAR O REGISTRO
                    // OBS: closest() PROCURA O ELEMENTO MAIS PROXIMO AO ATUAL
                    update_register($(rowTable).data('registro'), $('#actor_full_name').val(), $('#actor_birth_date').val());

                }else if(event.target.textContent === 'Salvar'){

                    // CHAMANDO A FUNÇÃO PARA INSERIR O REGISTRO
                    insert_register($('#actor_full_name').val(), $('#actor_birth_date').val());

                }                
            });

            // ENVIAR A ATUALIZAÇÃO DO REGISTRO PARA O SERVIDOR
            function update_register(id_actor, actor_full_name, actor_birth_date){
                
                // ENVIANDO A REQUISIÇÃO HTTP                  
                $.ajax({
                    url: "{{ route('actor_update') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        id_actor: id_actor,
                        actor_full_name: actor_full_name,
                        actor_birth_date: actor_birth_date
                    },
                    success: function(response) {
                        if(response.length == 0){
                            console.log(response);
                        }
                    }
                });                
            }

            // ENVIAR A CRIAÇÃO DO REGISTRO PARA O SERVIDOR
            function insert_register(actor_full_name, actor_birth_date){

                // ENVIANDO A REQUISIÇÃO HTTP                  
                $.ajax({
                    url: "{{ route('actor_insert') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        actor_full_name: actor_full_name,
                        actor_birth_date: actor_birth_date
                    },
                    success: function(response) {
                        if(response.length == 0){
                            console.log(response);
                        }

                        $("#principal-table").find('tbody')
                            .append(
                                $('<tr data-registro="' + response.id_actor + '">').append(
                                    $('<td>').append(response.id_actor),
                                    $('<td>').append(response.full_name),
                                    $('<td>').append(response.birth_date),
                                    $('<td class="text-center" style="width: 200px !important;">').append(
                                        `
                                            <button class="btn btn-sm btn-danger delete-register" data-bs-toggle="modal" data-bs-target="#staticBackdropDelete">Excluir</button>
                                            <button class="btn btn-sm btn-warning btn-insert-or-update" data-bs-toggle="modal" data-bs-target="#staticBackdropInsertUpdate">Editar</button>
                                        `
                                    )
                                )  
                        );
                    }
                });
            }

            /*
                // CRIAÇÃO DE TABELA DINAMICAMENTE COM JavaScrip
                var table = document.createElement('table');
                for (var i = 1; i < 4; i++){
                    var tr = document.createElement('tr');

                    var td1 = document.createElement('td');
                    var td2 = document.createElement('td');

                    var text1 = document.createTextNode('Text1');
                    var text2 = document.createTextNode('Text2');

                    td1.appendChild(text1);
                    td2.appendChild(text2);
                    tr.appendChild(td1);
                    tr.appendChild(td2);

                    table.appendChild(tr);
                }

                document.body.appendChild(table);
            */
        });
    </script>
@endsection