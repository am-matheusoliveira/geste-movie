@extends('layouts.app')

@section('content')
{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crie sua conta') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Endereço de email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Nome de usuário') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirme sua senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                                
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Realizar login') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
--}}


        <!-- Registration 1 - Bootstrap Brain Component -->
        <!-- <div class="bg-light d-flex justify-content-center align-items-center min-vh-100"> -->
        <div class="bg-light d-flex justify-content-center min-vh-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                        <div class="bg-white p-4 p-md-5 rounded shadow-sm border border-2" style="max-width: 500px; margin: 0 auto;">
                            <div class="row d-none">
                                <div class="col-12">
                                    <div class="text-center mb-5">
                                        <a href="#!">
                                            <img src="https://bootstrapbrain.com/demo/components/logins/login-1/assets/img/bsb-logo.svg" alt="BootstrapBrain Logo" width="175" height="57">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        
                            <p class="h2 mb-4 text-center">{{ __('Criar uma conta') }}</p>
                            
                            <form action="{{ route('register') }}" method="POST" class="requires-validation" novalidate>
                                @csrf
                                <div class="row gy-3 gy-md-4 overflow-hidden">
                                    <div class="col-12">
                                        <label for="name" class="form-label">{{ __('Nome') }} <span class="text-danger">*</span></label>

                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                                    <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
                                                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12z" />
                                                </svg>
                                            </span>
                                            <input type="text" class="form-control shadow-none @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" autocomplete="name" autofocus required>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror


                                            <div class="valid-feedback">Primeiro nome preenchido corretamente!</div>
                                            <div class="invalid-feedback">Por favor, insira seu primeiro nome!</div>
                                        </div>
                                    </div>
                                
                                    <div class="col-12">
                                        <label for="email" class="form-label">{{ __('Email') }} <span class="text-danger">*</span></label>

                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                </svg>                                                
                                            </span>

                                            <input type="email" class="form-control shadow-none @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="email" required>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="valid-feedback">E-mail válido preenchido corretamente!</div>
                                            <div class="invalid-feedback">Por favor, insira um e-mail válido!</div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <label for="username" class="form-label">{{ __('Usuário') }} <span class="text-danger">*</span></label>

                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                                </svg>
                                            </span>

                                            <input type="username" class="form-control shadow-none @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" autocomplete="username" required>

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="valid-feedback">Usuário válido preenchido corretamente!</div>
                                            <div class="invalid-feedback">Por favor, insira um usuário válido!</div>
                                        </div>
                                    </div>                                    



                                    <div class="col-12">
                                        <label for="password" class="form-label">{{ __('Senha') }} <span class="text-danger">*</span></label>
                                        
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                                    <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                                </svg>
                                            </span>
                                            <input type="password" class="form-control shadow-none @error('password') is-invalid @enderror" id="password" name="password" value="" autocomplete="new-password" required>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="valid-feedback">Senha válida preenchida corretamente!</div>
                                            <div class="invalid-feedback">Por favor, insira sua senha!</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password-confirm" class="form-label">{{ __('Confirme sua senha') }} <span class="text-danger">*</span></label>
                                        
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                                </svg>                                                
                                            </span>
                                            <input type="password" class="form-control shadow-none" id="password-confirm" name="password_confirmation" autocomplete="new-password" required>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="valid-feedback">Confirmação de senha válida preenchida corretamente!</div>
                                            <div class="invalid-feedback">Por favor, insira a confirmação de senha!</div>
                                        </div>
                                    </div>

                                    {{--
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input shadow-none" type="checkbox" value="" name="iAgree" id="iAgree" required>
                                            <label class="form-check-label text-secondary" for="iAgree">
                                                Eu concordo com os <a href="#!" class="link-primary text-decoration-none">termos e Condições</a>
                                            </label>
                                        </div>
                                    </div>
                                    --}}
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-lg shadow-none" type="submit">Cadastrar-se</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <p class="m-0 text-secondary text-center">Já tem uma conta? <a href="{{ route('login') }}" class="link-primary text-decoration-none">{{ __('Entrar') }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
