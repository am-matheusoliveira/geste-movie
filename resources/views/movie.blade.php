@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <a href="{{ url('/home') }}" class="btn btn-sm btn-primary">Retornar</a>
                                <strong>{{ __('Catálogo de Filmes') }}</strong>
                                <a href="{{ url('/movie') }}" class="btn btn-sm btn-primary btn-insert-or-update" data-bs-toggle="modal" data-bs-target="#staticBackdropInsertUpdate">Novo Registro</a>                                
                            </div>
                            
                            <table class="table table-striped w-100" id="principal-table">
                                <thead>
                                    <th>Título</th>
                                    <th class="text-center">Descrição</th>
                                    <th>Lançamento</th>
                                    <th>Duração</th>
                                    <th>Classificação</th>
                                    <th>Gênero</th>
                                    <th>Diretor</th>
                                    <th>Ator</th>
                                    <th class="text-center">Ações</th>
                                </thead>
                                <tbody>                                       
                                </tbody>
                            </table>
                                                    
                            <!-- MODAL PARA CRIAÇÃO E EDIÇÃO DOS REGISTROS -->
                            <div class="modal bd-example-modal-lg" id="staticBackdropInsertUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelInsertUpdate" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabelInsertUpdate">Novo Registro</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">                                            
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <button class="nav-link tab-disable-button active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Filme</button>
                                                    <button class="nav-link tab-disable-button" id="nav-genre-tab" data-bs-toggle="tab" data-bs-target="#nav-genre" type="button" role="tab" aria-controls="nav-genre" aria-selected="false">Gêneros</button>
                                                    <button class="nav-link tab-disable-button" id="nav-actor-tab" data-bs-toggle="tab" data-bs-target="#nav-actor" type="button" role="tab" aria-controls="nav-actor" aria-selected="false">Atores</button>
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <!-- TAB - Filme  -->
                                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                                    <form>
                                                        <div class="modal-body">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label for="movie_title">Título:</label>
                                                                    <input type="text" class="form-control" id="movie_title" name="movie_title" placeholder="" required maxlength="100">
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <label for="movie_description">Descrição:</label>                                                                    
                                                                    <textarea class="form-control" id="movie_description" name="movie_description" rows="5" maxlength="1000" required></textarea>
                                                                </div>
                                                                
                                                                <div class="form-group col-md-12">
                                                                    <label for="movie_id_director">Diretor:</label>                                                                    
                                                                    <select class="form-select" aria-label="Default select example" id="movie_id_director" name="movie_id_director" required>
                                                                        <option value="100000">Escolha um Diretor</option>
                                                                        @if (count($director_register) > 0)
                                                                            @foreach ($director_register as $director_register)
                                                                                <option value="{{ $director_register->id_director }}">{{ $director_register->full_name }}</option>
                                                                            @endforeach                                                                                
                                                                        @endif
                                                                    </select>                                                                 
                                                                </div>                                                    

                                                                <div class="form-row d-flex justify-content-between">
                                                                    <div class="form-group col-md-3">
                                                                        <label for="movie_release_year">Ano de Lançamento:</label>
                                                                        <input type="text" class="form-control validation-is-only-number" id="movie_release_year" name="movie_release_year" placeholder="" maxlength="4" required>
                                                                    </div>

                                                                    <div class="form-group col-md-3">
                                                                        <label for="movie_duration">Duração: (Minutos)</label>
                                                                        <input type="text" class="form-control validation-is-only-number" id="movie_duration" name="movie_duration" placeholder="" maxlength="3" required>
                                                                    </div>

                                                                    <div class="form-group col-md-3">
                                                                        
                                                                        <label for="movie_age_rating">Classificação: (Idade)</label>
                                                                        <select class="form-select" id="movie_age_rating" name="movie_age_rating" required>
                                                                            <option value="">Escolha uma Classificação</option>
                                                                            <option value="0">LIVRE (L)</option>
                                                                            <option value="10">10 (dez) anos</option>
                                                                            <option value="12">12 (doze) anos</option>
                                                                            <option value="14">14 (quatorze) anos</option>
                                                                            <option value="16">16 (dezesseis) anos</option>
                                                                            <option value="18">18 (dezoito) anos</option>
                                                                        </select>
                                                                        

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form> 
                                                </div>
                                                <!-- TAB - Gênero  -->
                                                <div class="tab-pane fade" id="nav-genre" role="tabpanel" aria-labelledby="nav-genre-tab" tabindex="0">
                                                    <div class="card p-2">
                                                        <div class="card-header d-flex justify-content-between">
                                                            <strong>Gêneros</strong>
                                                            <a href="{{ url('/movie') }}" class="btn btn-sm btn-primary btn-gm-insert-or-update" data-bs-toggle="modal" data-bs-target="#staticBackdropInsertUpdateGenre">Novo Registro</a>
                                                        </div>                                                        
                                                        
                                                        <table class="table table-striped" id="gm_table">
                                                            <thead>
                                                                <th>ID</th>
                                                                <th>Gênero</th>
                                                                <th class="text-center">Ações</th>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>

                                                        <!-- FIM DO MODAL PARA CRIAÇÃO E EDIÇÃO DOS REGISTROS - GENRE -->
                                                        <div class="modal" id="staticBackdropInsertUpdateGenre" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelInsertUpdateGenre" aria-hidden="true">
                                                            <div class="modal-dialog genre-modal-dialog">
                                                                <div class="modal-content genre-modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="staticBackdropLabelInsertUpdateGenre">Novo Registro</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body genre-modal-body">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-12">
                                                                                <label for="gm-id-genre">Gênero:</label>
                                                                                <select class="form-select" aria-label="Default select example" id="gm-id-genre" name="gm-id-genre" required>
                                                                                    <option value="100000">Escolha um Gênero</option>
                                                                                    @if (count($genre_register) > 0)
                                                                                        @foreach ($genre_register as $genre_register)
                                                                                            <option value="{{ $genre_register->id_genre }}">{{ $genre_register->name }}</option>
                                                                                        @endforeach
                                                                                    @endif                                                                                    
                                                                                </select>                                                                    
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                        <button type="button" class="btn btn-primary gm-insert-or-update" data-bs-dismiss="modal">?????</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- FIM DO MODAL PARA CRIAÇÃO E EDIÇÃO DOS REGISTROS - GENRE -->

                                                        <!-- MODAL PARA EXCLUSÃO DOS REGISTROS - GENRE -->
                                                        <div class="modal" id="staticBackdropDeleteGenre" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelDeleteGenre" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="staticBackdropLabelDeleteGenre">Excluir Registro</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Tem certeza que deseja excluir este registro ?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                                                        <button type="button" class="btn btn-primary" id="gm-delete-action" data-bs-dismiss="modal">Sim</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- FIM DO MODAL PARA EXCLUSÃO DOS REGISTROS - GENRE --> 
                                                    </div>
                                                </div>
                                                <!-- TAB - Atores  -->
                                                <div class="tab-pane fade" id="nav-actor" role="tabpanel" aria-labelledby="nav-actor-tab" tabindex="0">
                                                    <div class="card p-2">
                                                        <div class="card-header d-flex justify-content-between">
                                                            <strong>Atores</strong>
                                                            <a href="{{ url('/movie') }}" class="btn btn-sm btn-primary btn-am-insert-or-update" data-bs-toggle="modal" data-bs-target="#staticBackdropInsertUpdateActor">Novo Registro</a>
                                                        </div>

                                                        <table class="table table-striped" id="am_table">
                                                            <thead>
                                                                <th>ID</th>
                                                                <th>Ator</th>
                                                                <th class="text-center">Ações</th>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>

                                                        <!-- FIM DO MODAL PARA CRIAÇÃO E EDIÇÃO DOS REGISTROS - ACTOR -->
                                                        <div class="modal" id="staticBackdropInsertUpdateActor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelInsertUpdateActor" aria-hidden="true">
                                                            <div class="modal-dialog actor-modal-dialog">
                                                                <div class="modal-content actor-modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="staticBackdropLabelInsertUpdateActor">Novo Registro</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body actor-modal-body">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-12">
                                                                                <label for="am-id-actor">Ator:</label>
                                                                                <select class="form-select" aria-label="Default select example" id="am-id-actor" name="am-id-actor" required>
                                                                                    <option value="100000">Escolha um Ator</option>
                                                                                    @if (count($actor_register) > 0)
                                                                                        @foreach ($actor_register as $actor_register)
                                                                                            <option value="{{ $actor_register->id_actor }}">{{ $actor_register->full_name }}</option>
                                                                                        @endforeach
                                                                                    @endif                                                                                    
                                                                                </select>                                                                    
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                        <button type="button" class="btn btn-primary am-insert-or-update" data-bs-dismiss="modal">?????</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- FIM DO MODAL PARA CRIAÇÃO E EDIÇÃO DOS REGISTROS - ACTOR -->

                                                        <!-- MODAL PARA EXCLUSÃO DOS REGISTROS - ACTOR -->
                                                        <div class="modal" id="staticBackdropDeleteActor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelDeleteActor" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="staticBackdropLabelDeleteActor">Excluir Registro</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Tem certeza que deseja excluir este registro ?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                                                        <button type="button" class="btn btn-primary" id="am-delete-action" data-bs-dismiss="modal">Sim</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- FIM DO MODAL PARA EXCLUSÃO DOS REGISTROS - ACTOR -->                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-cancel" data-bs-dismiss="modal">Cancelar</button>
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

            // CONFIGURAÇÕES DO PLUGIN: DataTables
            new DataTable('#principal-table', {
                processing: true,
                serverSide: true,
                ajax: "{{ route('movie_list_records') }}",                
                scrollY: "70vh",      // SCROLL_BAR - VERTICAL
                scrollX: true,        // SCROLL_BAR - HORIZONTAL
                scrollCollapse: true, // HABILITA O REDIMENSIONAMENTO AUTOMÁTICO DO CONTAINER DO DataTables. scrollY PRECISA SER DEFINIDO
                paging: true,         // PAGINAÇÃO DOS DADOS
                bInfo : false,        // MOSTRANDO REGISTROS DE 1 á 10
                lengthChange: false,  // REGISTROS POR PÁGINA - ComboBox
                pageLength: 25,       // QUANTIDADE DE REGISTROS PADRÃO POR PÁGINA
                layout: {
                    topEnd: null,
                },
                columns: [
                    // {data: 'DT_RowIndex',  name: 'DT_RowIndex'},
                    {data: 'title',           name: 'title'},
                    {data: 'description',     name: 'description'},
                    {data: 'release_year',    name: 'release_year'},                    
                    {data: 'duration_h_m',    name: 'duration_h_m'},                    
                    {data: 'age_rating_text', name: 'age_rating_text'},
                    {data: 'genre_name',      name: 'genre_name'},
                    {data: 'director_name',   name: 'director_name'},
                    {data: 'actor_name',      name: 'actor_name'},
                    {data: 'action',          name: 'action'},
                ],
                columnDefs: [
                    { searchable: false, targets: [0, 1, 3, 6, 7, 8]},
                    // { searchable: true, targets: [2, 4, 5]},
                    { orderable: false, targets: [2, 4, 5, 7, 8]},
                ],
                language: {                    
                    url: "{{ asset('resources/js/language-pt-br-datatables.json') }}"
                },
                createdRow: function (row, data, dataIndex) {
                    $(row).attr('data-registro',    data.movie_id_movie);
                    $(row).attr('data-id_director', data.id_director);
                    $(row).attr('data-duration',    data.duration);
                    $(row).attr('data-age_rating',  data.age_rating);
                },
                initComplete: function () {
                    this.api()
                        .columns([2, 4, 5])
                        .every(function(){
                            let column = this;
                            
                            // CRIANDO O ELEMENTO: <select>
                            let select = document.createElement('select');

                            // ATRIBUINDO CLASSE AO <header> E AO <select>
                            column.header().setAttribute('class', 'text-center');
                            select.setAttribute('class', 'fw-bold');

                            // CRIANDO E ADICIONANDO O <select> AO <header> DA COLUNA 
                            select.add(new Option(column.header().innerText));
                            column.header().replaceChildren(select);

                            // EVENTO DE change AO MUDAR CADA <select>
                            select.addEventListener('change', function () {

                                if(['Lançamento', 'Classificação', 'Gênero'].indexOf(select.value) >= 0){
                                    column.search('', {exact: true}).draw();
                                }else{                                
                                    column.search(select.value, {exact: true}).draw();
                                }
                            });

                            // INCLUINDO OS VALORES AO SELECT
                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function (value, key) {

                                    // VALOR NULO NÃO DEVE APARECER
                                    if(value != null){
                                        select.add(new Option(value));
                                    }
                                });
                        });
                },
            });

            // LINHA QUE FOI CLICADA NA TABELA
            var rowTable = null;
            
            // ID MOVIE - FILME QUE FOI CLICADO NA TABELA
            var idMovie = null;

            // DEFINIÇÃO DO CABEÇALHO PADRÃO PARA AS REQUISIÇÕES HTTP
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /*------------------------------- SUB-CADASTROS ----------------------------*/

            // DESABILITAR OS BOTÕES CASO O USUÁRIOS ESTEJA EM UM SUB-CADASTRO
            $('.tab-disable-button').click(function(event){
                if(event.target.textContent === 'Gêneros' || event.target.textContent === 'Atores'){
                    $('.insert-or-update').prop('disabled', true);
                    $('.btn-cancel').prop('disabled', true);
                }else{
                    $('.insert-or-update').prop('disabled', false);
                    $('.btn-cancel').prop('disabled', false);
                }
            });

            // CONFIGURAÇÕES DOS MODAIS - PARA OS SUB-CADASTROS
            const modal_movie = bootstrap.Modal.getOrCreateInstance('#staticBackdropInsertUpdate');
            //
            const modal_genre_delete = document.getElementById('staticBackdropDeleteGenre');
            const modal_genre_insert_update = document.getElementById('staticBackdropInsertUpdateGenre');
            //
            const modal_actor_delete = document.getElementById('staticBackdropDeleteActor');
            const modal_actor_insert_update = document.getElementById('staticBackdropInsertUpdateActor');

            // QUANDO 2º MODAL(GENRE - DELETE) ESTIVER ABERTO, RE-ABRA O 1º MODAL
            modal_genre_delete.addEventListener('show.bs.modal', event => {
            
                // FORÇANDO A RE-ABERTURA DO 1º MODAL
                modal_movie.show();
            });
            
            // QUANDO 2º MODAL(GENRE - INSERT or UPDATE) ESTIVER ABERTO, RE-ABRA O 1º MODAL
            modal_genre_insert_update.addEventListener('show.bs.modal', event => {
            
                // FORÇANDO A RE-ABERTURA DO 1º MODAL
                modal_movie.show();
            });

            // QUANDO 2º MODAL(ACTOR - DELETE) ESTIVER ABERTO, RE-ABRA O 1º MODAL
            modal_actor_delete.addEventListener('show.bs.modal', event => {
            
                // FORÇANDO A RE-ABERTURA DO 1º MODAL
                modal_movie.show();
            });

            // QUANDO 2º MODAL(ACTOR - INSERT or UPDATE) ESTIVER ABERTO, RE-ABRA O 1º MODAL
            modal_actor_insert_update.addEventListener('show.bs.modal', event => {

                // FORÇANDO A RE-ABERTURA DO 1º MODAL
                modal_movie.show();
            });

            /*---------------------- GÊNEROS ----------------------- */

            // MOSTRAR O MODAL DE EXCLUSÃO DO REGISTRO E PEGAR A LINHA QUE FOI CLICADA NA TABELA - GÊNERO
            $(document).on('click', '.gm-delete-register', function(event){

                // SALVANDO A LINHA DA TABELA
                rowTable = event.target.closest("tr");
            });

            // AÇÃO EXECUTADA - EXCLUSÃO - GÊNERO
            $('#gm-delete-action').click(function(){
                
                // ENVIANDO A REQUISIÇÃO HTTP - EXCLUSÃO GENRE_MOVIE DO SERVIDOR
                $.ajax({
                    url: "{{ route('genre_movie_delete') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        id_genre_movie: $(rowTable).data('registro')
                    },
                    success: function(response) {
                        if(response.length == 0){
                            console.log(response);
                        }
                        // REMOVENDO LINHA DA TABELA HTML
                        rowTable.remove();

                        // ATUALIZANDO O DataTables - DEPOIS DO EVENTO
                        new DataTable('#principal-table').ajax.reload();
                    }
                });                 
            });
            
            // MOSTRAR O MODAL DE INSERÇÃO E EDIÇÃO DO REGISTRO - GÊNERO
            $(document).on('click', '.btn-gm-insert-or-update', function(event){
                if(event.target.textContent === 'Novo Registro'){

                    // CONFIGURAÇÃO: Novo Registro
                    $('#staticBackdropLabelInsertUpdateGenre').html("Novo Registro");
                    $('.gm-insert-or-update').html("Salvar");

                    // LIMPANDO O INPUT
                    $('#gm-id-genre').val(100000).change();

                }else if(event.target.textContent === 'Editar'){

                    // SALVANDO A LINHA DA TABELA
                    rowTable = event.target.closest("tr");
                    
                    // CONFIGURAÇÃO: Editar Registro
                    $('#staticBackdropLabelInsertUpdateGenre').html("Editar Registro");
                    $('.gm-insert-or-update').html("Editar");

                    // DEFININDO A OPÇÃO DO SELECT Gênero COM BASE NO: id_genre
                    $("#gm-id-genre").val(rowTable.cells[0].textContent).change();
                    
                }                
            });

            // -------------------- AÇÃO EXECUTADA - INSERÇÃO ou ATUALIZAÇÃO - GÊNERO --------------------/
            $('.gm-insert-or-update').click(function(event){

                if(event.target.textContent === 'Editar'){        

                    // COLOCAR O VALUE DO OPTION DO SELECT NA CELULA DA LINHA
                    rowTable.cells[0].textContent = $('#gm-id-genre').val();

                    // COLOCAR O TEXTO DO OPTION DO SELECT NA CELULA DA LINHA
                    rowTable.cells[1].textContent = $("#gm-id-genre option:selected").text();
                    
                    // CHAMANDO A FUNÇÃO PARA ATUALIZAR O REGISTRO
                    update_genre_movie($(rowTable).data('registro'), $('#gm-id-genre').val());
            
                }else if(event.target.textContent === 'Salvar'){
            
                    // CHAMANDO A FUNÇÃO PARA INSERIR O REGISTRO
                    insert_genre_movie($('#gm-id-genre').val(), idMovie);
            
                }                
            });

            // ENVIAR A ATUALIZAÇÃO DO REGISTRO PARA O SERVIDOR - GÊNEROS
            function update_genre_movie(id_genre_movie, id_genre){
                // ENVIANDO A REQUISIÇÃO HTTP                  
                $.ajax({
                    url: "{{ route('genre_movie_update') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        id_genre_movie: id_genre_movie,
                        id_genre: id_genre,
                    },
                    success: function(response) {
                        if(response.length == 0){
                            console.log(response);
                        }

                        // ATUALIZANDO O DataTables - DEPOIS DO EVENTO
                        new DataTable('#principal-table').ajax.reload();
                    }
                });
            }            

            // ENVIAR A INSERÇÃO DO REGISTRO PARA O SERVIDOR - GÊNEROS
            function insert_genre_movie(id_genre, id_movie){
                // ENVIANDO A REQUISIÇÃO HTTP                  
                $.ajax({
                    url: "{{ route('genre_movie_insert') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        id_genre: id_genre,
                        id_movie: id_movie,
                    },
                    success: function(response) {
                        if(response.length == 0){
                            console.log(response);
                        }

                        $("#gm_table").find('tbody')
                            .append(
                                $('<tr data-registro="' + response.id_genre_movie + '">').append(
                                    $('<td>').append(response.id_genre),
                                    $('<td>').append(response.name),
                                    $('<td class="text-center" style="width: 200px !important;">').append(
                                        `
                                            <button class="btn btn-sm btn-danger gm-delete-register" data-bs-toggle="modal" data-bs-target="#staticBackdropDeleteGenre">Excluir</button>
                                            <button class="btn btn-sm btn-warning btn-gm-insert-or-update" data-bs-toggle="modal" data-bs-target="#staticBackdropInsertUpdateGenre">Editar</button>
                                        `
                                    )
                                )  
                        );

                        // ATUALIZANDO O DataTables - DEPOIS DO EVENTO
                        new DataTable('#principal-table').ajax.reload();
                    }
                });
            }

            /*---------------------- ATORES ----------------------- */

            // MOSTRAR O MODAL DE EXCLUSÃO DO REGISTRO E PEGAR A LINHA QUE FOI CLICADA NA TABELA - ATORES
            $(document).on('click', '.am-delete-register', function(event){

                // SALVANDO A LINHA DA TABELA
                rowTable = event.target.closest("tr");
            });

            // AÇÃO EXECUTADA - EXCLUSÃO - ATORES
            $('#am-delete-action').click(function(){            

               // ENVIANDO A REQUISIÇÃO HTTP - EXCLUSÃO ACTOR_MOVIE DO SERVIDOR
               $.ajax({
                    url: "{{ route('actor_movie_delete') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        id_actor_movie: $(rowTable).data('registro')
                    },
                    success: function(response) {
                        if(response.length == 0){
                            console.log(response);
                        }
                        // REMOVENDO LINHA DA TABELA HTML
                        rowTable.remove();

                        // ATUALIZANDO O DataTables - DEPOIS DO EVENTO
                        new DataTable('#principal-table').ajax.reload();
                    }
                });                 
                
            });
            
            // MOSTRAR O MODAL DE INSERÇÃO E EDIÇÃO DO REGISTRO - ATORES
            $(document).on('click', '.btn-am-insert-or-update', function(event){
                if(event.target.textContent === 'Novo Registro'){

                    // CONFIGURAÇÃO: Novo Registro
                    $('#staticBackdropLabelInsertUpdateActor').html("Novo Registro");
                    $('.am-insert-or-update').html("Salvar");

                    // LIMPANDO O INPUT
                    $('#am-id-actor').val(100000).change();

                }else if(event.target.textContent === 'Editar'){

                    // SALVANDO A LINHA DA TABELA
                    rowTable = event.target.closest("tr");
                    
                    // CONFIGURAÇÃO: Editar Registro
                    $('#staticBackdropLabelInsertUpdateActor').html("Editar Registro");
                    $('.am-insert-or-update').html("Editar");

                    // DEFININDO A OPÇÃO DO SELECT Gênero COM BASE NO: id_actor
                    $("#am-id-actor").val(rowTable.cells[0].textContent).change();
                    
                }                
            });

            // -------------------- AÇÃO EXECUTADA - INSERÇÃO ou ATUALIZAÇÃO - ATORES --------------------/
            $('.am-insert-or-update').click(function(event){

                if(event.target.textContent === 'Editar'){        

                    // COLOCAR O VALUE DO OPTION DO SELECT NA CELULA DA LINHA
                    rowTable.cells[0].textContent = $('#am-id-actor').val();

                    // COLOCAR O TEXTO DO OPTION DO SELECT NA CELULA DA LINHA
                    rowTable.cells[1].textContent = $("#am-id-actor option:selected").text();
                    
                    // CHAMANDO A FUNÇÃO PARA ATUALIZAR O REGISTRO
                    update_actor_movie($(rowTable).data('registro'), $('#am-id-actor').val());
            
                }else if(event.target.textContent === 'Salvar'){
            
                    // CHAMANDO A FUNÇÃO PARA INSERIR O REGISTRO
                    insert_actor_movie($('#am-id-actor').val(), idMovie);
            
                }                
            });

            // ENVIAR A ATUALIZAÇÃO DO REGISTRO PARA O SERVIDOR - ATORES
            function update_actor_movie(id_actor_movie, id_actor){
                // ENVIANDO A REQUISIÇÃO HTTP                  
                $.ajax({
                    url: "{{ route('actor_movie_update') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        id_actor_movie: id_actor_movie,
                        id_actor: id_actor,
                    },
                    success: function(response) {
                        if(response.length == 0){
                            console.log(response);
                        }

                        // ATUALIZANDO O DataTables - DEPOIS DO EVENTO
                        new DataTable('#principal-table').ajax.reload();
                    }
                });
            }            

            // ENVIAR A INSERÇÃO DO REGISTRO PARA O SERVIDOR - ATORES
            function insert_actor_movie(id_actor, id_movie){
                // ENVIANDO A REQUISIÇÃO HTTP                  
                $.ajax({
                    url: "{{ route('actor_movie_insert') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        id_actor: id_actor,
                        id_movie: id_movie,
                    },
                    success: function(response) {
                        if(response.length == 0){
                            console.log(response);
                        }

                        $("#am_table").find('tbody')
                            .append(
                                $('<tr data-registro="' + response.id_actor_movie + '">').append(
                                    $('<td>').append(response.id_actor),
                                    $('<td>').append(response.full_name),
                                    $('<td class="text-center" style="width: 200px !important;">').append(
                                        `
                                            <button class="btn btn-sm btn-danger am-delete-register" data-bs-toggle="modal" data-bs-target="#staticBackdropDeleteActor">Excluir</button>
                                            <button class="btn btn-sm btn-warning btn-am-insert-or-update" data-bs-toggle="modal" data-bs-target="#staticBackdropInsertUpdateActor">Editar</button>
                                        `
                                    )
                                )  
                        );

                        // ATUALIZANDO O DataTables - DEPOIS DO EVENTO
                        new DataTable('#principal-table').ajax.reload();                        
                    }
                });
            }

            /*------------------------------- SUB-CADASTROS ----------------------------*/

            // SOMENTE PODERA DIGITAR NUMEROS ENTRE [0-9]
            $('#movie_release_year').mask("0000");
            $('#movie_duration').mask("000");

            // -------------------------------- DELETE -------------------------------//
            // MODAL DELETE
            $(document).on('click', '.delete-register', function(event){
                
                // SALVANDO A LINHA DA TABELA
                rowTable = event.target.closest("tr");

            });

            // AÇÃO EXECUTADA - EXCLUSÃO
            $('#delete-action').click(function(){
                
                // ENVIANDO A REQUISIÇÃO HTTP - EXCLUINDO O REGISTRO DO SERVIDOR
                $.ajax({
                    url: "{{ route('movie_delete') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        movie_id_movie: $(rowTable).data('registro')
                    },
                    success: function(response) {
                        if(response.length == 0){
                            console.log(response);
                        }

                        // ATUALIZANDO O DataTables - DEPOIS DO EVENTO
                        new DataTable('#principal-table').ajax.reload();
                    }
                });                 
                
            });
            
            // -------------------- MODAL PARA INSERT ou UPDATE --------------------/
            $(document).on('click', '.btn-insert-or-update', function(event){

                if(event.target.textContent === 'Novo Registro'){
                    
                    // REINICIANDO A VARIAVEL idMovie
                    idMovie = null;

                    // CONFIGURAÇÃO: Novo Registro
                    $('#staticBackdropLabelInsertUpdate').html("Novo Registro");
                    $('.insert-or-update').html("Salvar");

                    // CONFIGURAÇÃO DAS TABS
                    $('#nav-home-tab').click();
                    $('#nav-genre-tab').addClass('disabled');
                    $('#nav-actor-tab').addClass('disabled');

                    // LIMPANDO O INPUT
                    $('#movie_title').val('');
                    $('#movie_description').val('');
                    $('#movie_release_year').val('');
                    $('#movie_duration').val('');
                    $('#movie_age_rating').val('');
                    $('#movie_id_director').val(100000).change();

                }else if(event.target.textContent === 'Editar'){

                    // SALVANDO A LINHA DA TABELA
                    rowTable = event.target.closest("tr");

                    // CAPTURANDO O ID DO FILME CLICADO
                    idMovie = $(rowTable).data('registro');
                    
                    // CONFIGURAÇÃO: Editar Registro
                    $('#staticBackdropLabelInsertUpdate').html("Editar Registro");
                    $('.insert-or-update').html("Editar");
                    
                    // CONFIGURAÇÃO DAS TABS
                    $('#nav-home-tab').click();
                    $('#nav-genre-tab').removeClass('disabled');
                    $('#nav-actor-tab').removeClass('disabled');                    

                    // PEGANDO O VALOR DA COLUNA DA LINHA E COLOCANDO NO INPUT
                    $('#movie_title').val(rowTable.cells[0].innerText);
                    $('#movie_description').val($(rowTable.cells[1]).find('textarea').val());

                    // DEFININDO A OPÇÃO DO SELECT Diretor COM BASE NO: id_director
                    $("#movie_id_director").val($(rowTable).data('id_director')).change();


                    $('#movie_release_year').val(rowTable.cells[2].innerText);
                    $('#movie_duration').val($(rowTable).data('duration'));
                    $('#movie_age_rating').val($(rowTable).data('age_rating')).change();
                    

                    // BUSCAR OS GÊNEROS DO FILME SELECIONADO
                    select_genre_movie(idMovie);
                    
                    // BUSCAR OS ATORES DO FILME SELECIONADO
                    select_actor_movie(idMovie);
                }
            });            
            
            // -------------------- AÇÃO EXECUTADA - INSERÇÃO ou ATUALIZAÇÃO --------------------/
            $('.insert-or-update').click(function(event){            
                // ENVIANDO A REQUISIÇÃO HTTP - INSERINDO OU ATUALIZANDO O REGISTRO DO SERVIDOR
                $.ajax({
                    url: "{{ route('movie_insert_or_update') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        movie_id_movie:     idMovie,
                        movie_title:        $('#movie_title').val(),
                        movie_description:  $('#movie_description').val(),
                        movie_release_year: $('#movie_release_year').val(),
                        movie_duration:     $('#movie_duration').val(),
                        movie_age_rating:   $('#movie_age_rating').val(),
                        movie_id_director:  $('#movie_id_director').val()
                    },
                    success: function(response) {
                        if(response.length == 0){
                            console.log(response);
                        }

                        // ATUALIZANDO O DataTables - DEPOIS DO EVENTO
                        new DataTable('#principal-table').ajax.reload();
                    }
                });                 
                                
            });

            // REALIZAR A BUSCA DOS GÊNEROS DO FILME - ABA GÊNEROS
            function select_genre_movie(id_movie){
                
                // ENVIANDO A REQUISIÇÃO HTTP                  
                $.ajax({
                    url: "{{ route('genre_movie_index') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        id_movie: id_movie
                    },                    
                    success: function(response) {
                        if(response.length == 0){
                            console.log(response);
                        }

                        // RESETAR A TABELA PARA OS NOVOS DADOS
                        $("#gm_table").find('tbody').empty();

                        // IMPRIMINDO OS DADOS DA REQUISIÇÃO
                        for(cont = 0; cont < response.length; cont++){
                            $("#gm_table").find('tbody')
                                .append(
                                    $('<tr data-registro="' + response[cont].id_genre_movie + '">').append(
                                        $('<td>').append(response[cont].id_genre),
                                        $('<td>').append(response[cont].name),
                                        $('<td class="text-center" style="width: 200px !important;">').append(
                                            `                                            
                                                <button class="btn btn-sm btn-danger gm-delete-register" data-bs-toggle="modal" data-bs-target="#staticBackdropDeleteGenre">Excluir</button>
                                                <button class="btn btn-sm btn-warning btn-gm-insert-or-update" data-bs-toggle="modal" data-bs-target="#staticBackdropInsertUpdateGenre">Editar</button>
                                            `
                                        )
                                    )
                                );
                        }
                    }
                });
            }

            // REALIZAR A BUSCA DOS ATORES DO FILME - ABA ATORES
            function select_actor_movie(id_movie){
                
                // ENVIANDO A REQUISIÇÃO HTTP
                $.ajax({
                    url: "{{ route('actor_movie_index') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        id_movie: id_movie
                    },                    
                    success: function(response) {
                        if(response.length == 0){
                            console.log(response);
                        }

                        // RESETAR A TABELA PARA OS NOVOS DADOS
                        $("#am_table").find('tbody').empty();

                        // IMPRIMINDO OS DADOS DA REQUISIÇÃO
                        for(cont = 0; cont < response.length; cont++){
                            $("#am_table").find('tbody')
                                .append(
                                    $('<tr data-registro="' + response[cont].id_actor_movie + '">').append(
                                        $('<td>').append(response[cont].id_actor),
                                        $('<td>').append(response[cont].full_name),
                                        $('<td class="text-center" style="width: 200px !important;">').append(
                                            `                                            
                                                <button class="btn btn-sm btn-danger am-delete-register" data-bs-toggle="modal" data-bs-target="#staticBackdropDeleteActor">Excluir</button>
                                                <button class="btn btn-sm btn-warning btn-am-insert-or-update" data-bs-toggle="modal" data-bs-target="#staticBackdropInsertUpdateActor">Editar</button>
                                            `
                                        )
                                    )
                                );
                        }
                    }
                });
            }            

            /* ------------------ BUSCAR A LISTA DE ATORES BASEADO NO FILME CLICADO ------------------------------------------ */

            // BUSCAR A LISTA DOS ATORES
            $(document).on('click', '.btn-list-actor-movie', function(event){
                // ALTERANDO O NOME DO FILME NO CABEÇALHO DO MODAL
                $('#staticBackdropLabelListActor').html('Atores do Filme: ' + event.target.closest("tr").cells[0].textContent);

                // ENVIANDO A REQUISIÇÃO HTTP                  
                $.ajax({
                    url: "{{ route('movie_list_actor') }}",
                    type: 'POST',
                    dataType: "json", 
                    data: {
                        id_movie: $(event.target.closest("tr")).data('registro')
                    },                    
                    success: function(response) {
                        if(response.length == 0){
                            console.log(response);
                        }

                        // RESETAR A TABELA PARA OS NOVOS DADOS
                        $("#actor_movie_list").find('tbody').empty();

                        // IMPRIMINDO OS DADOS DA REQUISIÇÃO
                        for(cont = 0; cont < response.length; cont++){
                            $("#actor_movie_list").find('tbody')
                                .append(
                                    $('<tr>').append(
                                        $('<td>').append(response[cont].id_actor),
                                        $('<td>').append(response[cont].full_name)
                                    )
                                );
                        }
                    }
                });
            });

        });
    </script>
@endsection