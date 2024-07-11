@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <!-- OPÇÕES DO SISTEMA  -->
                <div class="card-header">
                    <strong>{{ __('Menu do sistema') }}</strong> 
                    <br>
                    <p class="h3">{{ __('Escolha uma opção para navegar pelo sistema!') }}</p>
                </div>
                
                <div class="card-body">
                    <div class="card">                        
                        <div class="card-header">
                            <strong>Gêneros</strong>
                        </div>

                        <div class="card-body d-flex justify-content-around">
                            <h5 class="card-title">Gêneros de Filmes</h5>
                            <p class="card-text"></p>
                            <a href="{{ url('/genre') }}" class="btn btn-primary">Acessar opção</a>
                        </div>
                    </div>
                    
                    <div class="card mt-2">
                        <div class="card-header">
                            <strong>Atores</strong>
                        </div>

                        <div class="card-body d-flex justify-content-around">
                            <h5 class="card-title">Atores de Filmes</h5>
                            <p class="card-text"></p>
                            <a href="{{ url('/actor') }}" class="btn btn-primary">Acessar opção</a>
                        </div>
                    </div>
                    
                    <div class="card mt-2">
                        <div class="card-header">
                            <strong>Diretores</strong>
                        </div>

                        <div class="card-body d-flex justify-content-around">
                            <h5 class="card-title">Diretores de Filmes</h5>
                            <p class="card-text"></p>
                            <a href="{{ url('/director') }}" class="btn btn-primary">Acessar opção</a>
                        </div>
                    </div>

                    <div class="card mt-2">
                        <div class="card-header">
                            <strong>Filmes</strong>
                        </div>

                        <div class="card-body d-flex justify-content-around">
                            <h5 class="card-title">Catálogo de Filmes</h5>
                            <p class="card-text"></p>
                            <a href="{{ url('/movie') }}" class="btn btn-primary">Acessar opção</a>
                        </div>
                    </div>
                </div>                 
            </div>
        </div>
    </div>
</div>
@endsection
