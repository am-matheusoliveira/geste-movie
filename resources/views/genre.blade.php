@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    <div class="card-header">
                        <strong>{{ __('Gêneros') }}</strong>
                    </div>

                    <div class="card-body">                    

                        <div class="card-body d-flex justify-content-between">
                            <a href="{{ url('/home') }}" class="btn btn-sm btn-primary">Retornar</a>
                            <a href="{{ url('/genre') }}" class="btn btn-sm btn-primary btn-insert-or-update" data-bs-toggle="modal" data-bs-target="#staticBackdropInsertUpdate">Novo Registro</a>
                            
                        </div>

                        <div class="card p-2">                        
                            <div class="card-header">
                                <strong>Gêneros</strong>
                            </div>

                            @if (count($result_genre) > 0)
                                <table class="table table-striped" id="principal-table">
                                    <thead>
                                        <th>ID</th>
                                        <th>Gênero</th>
                                        <th class="text-center">Ações</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($result_genre as $result_genre)
                                            <tr data-registro="{{ $result_genre->id_genre }}">
                                                <td>{{ $result_genre->id_genre }}</td>
                                                <td>{{ $result_genre->name }}</td>
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
                                                        <label for="genre_name">Nome do Gênero:</label>
                                                        <input type="text" class="form-control" id="genre_name" name="genre_name" placeholder="" required maxlength="50">
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
            function delete_register(id_genre){
                
                // ENVIANDO A REQUISIÇÃO HTTP                  
                $.ajax({
                    url: "{{ route('genre_delete') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        id_genre: id_genre
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
                    $('#genre_name').val('');

                }else if(event.target.textContent === 'Editar'){                                        

                    // SALVANDO A LINHA DA TABELA
                    rowTable = event.target.closest("tr");                    

                    // CONFIGURAÇÃO: Editar Registro
                    $('#staticBackdropLabelInsertUpdate').html("Editar Registro");
                    $('.insert-or-update').html("Editar");

                    // PEGANDO O VALOR DA COLUNA DA LINHA E COLOCANDO NO INPUT
                    $('#genre_name').val(event.target.closest("tr").cells[1].innerText);
                }
            });            
            
            // -------------------- AÇÃO EXECUTADA - INSERÇÃO ou ATUALIZAÇÃO --------------------/
            $('.insert-or-update').click(function(event){                                

                if(event.target.textContent === 'Editar'){

                    // PEGANDO O VALOR DO INPUT E COLOCANDO NA COLUNA DA LINHA
                    rowTable.cells[1].innerText = $('#genre_name').val();                

                    // CHAMANDO A FUNÇÃO PARA ATUALIZAR O REGISTRO
                    // OBS: closest() PROCURA O ELEMENTO MAIS PROXIMO AO ATUAL
                    update_register($(rowTable).data('registro'), $('#genre_name').val());

                }else if(event.target.textContent === 'Salvar'){

                    // CHAMANDO A FUNÇÃO PARA INSERIR O REGISTRO
                    insert_register($('#genre_name').val());

                }                
            });

            // ENVIAR A ATUALIZAÇÃO DO REGISTRO PARA O SERVIDOR
            function update_register(id_genre, genre_name){
                
                // ENVIANDO A REQUISIÇÃO HTTP                  
                $.ajax({
                    url: "{{ route('genre_update') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        id_genre: id_genre,
                        genre_name: genre_name
                    },
                    success: function(response) {
                        if(response.length == 0){
                            console.log(response);
                        }
                    }
                });                
            }

            // ENVIAR A CRIAÇÃO DO REGISTRO PARA O SERVIDOR
            function insert_register(genre_name){

                // ENVIANDO A REQUISIÇÃO HTTP                  
                $.ajax({
                    url: "{{ route('genre_insert') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        genre_name: genre_name
                    },
                    success: function(response) {
                        if(response.length == 0){
                            console.log(response);
                        }

                        $("#principal-table").find('tbody')
                            .append(
                                $('<tr data-registro="' + response.id_genre + '">').append(
                                    $('<td>').append(response.id_genre),
                                    $('<td>').append(response.name),
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