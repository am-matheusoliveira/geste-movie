@extends('layouts.app')

@section('content')
{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Realizar login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" style="padding-left: -12em !important;">
                        @csrf

                        <div class="row mb-3">
                                                        
                            <div class="col-md-6 offset-md-3">
                                <label for="username" class="form-label text-md-end">{{ __('Email ou nome de usuário') }}</label>
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror @error('email') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            
                            <div class="col-md-6 offset-md-3">
                                <label for="password" class="form-label text-md-end">{{ __('Senha') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            
                            <div class="col offset-md-3" style="max-width: 30%;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembre de mim') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col">

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link p-0" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu sua senha ?') }}
                                    </a>
                                @endif  

                            </div>                                                        
                        </div>

                        <div class="row">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Entrar') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('Crie sua conta') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

--}}






        <!-- Login 1 - Bootstrap Brain Component -->
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
                            
                            <p class="h2 mb-4 text-center">{{ __('Entrar') }}</p>

                            <form action="{{ route('login') }}" method="POST" class="requires-validation" novalidate>
                                @csrf
                                <div class="row gy-3 gy-md-4 overflow-hidden">
                                    <div class="col-12">
                                        <label for="username" class="form-label">{{ __('Email ou nome de usuário') }} <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                </svg>
                                            </span>
                                            <input type="username" class="form-control shadow-none @error('username') is-invalid @enderror @error('email') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" autocomplete="username" autofocus required>

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
    
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="valid-feedback">E-mail válido.</div>
                                            <div class="invalid-feedback">Informe um endereço de e-mail válido para continuar.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex gap-2 justify-content-between">
                                            <label for="password" class="form-label">{{ __('Senha') }} <span class="text-danger">*</span></label>
                                            @if (Route::has('password.request'))                                                                                                
                                                <a href="{{ route('password.request') }}" class="link-primary text-decoration-none">{{ __('Esqueceu sua senha?') }}</a>
                                            @endif                                            
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                                    <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                                </svg>
                                            </span>
                                            <input type="password" class="form-control shadow-none @error('password') is-invalid @enderror" id="password" name="password" value="" autocomplete="current-password" required>
                                            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="valid-feedback">Senha válida.</div>
                                            <div class="invalid-feedback">Digite sua senha para continuar.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input shadow-none" id="inputRememberMe" name="inputRememberMe" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label text-secondary no-select" for="inputRememberMe">                                                
                                                {{ __('Manter-me conectado') }}                                                
                                            </label>
                                        </div>
                                        {{--
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input shadow-none" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label text-secondary no-select" for="remember">                                                
                                                {{ __('Manter-me conectado') }}                                                
                                            </label>
                                        </div>
                                        --}}
                                        
                                        <small class="form-text text-muted d-none" id="messageInputRememberMe">{{ __('Você permanecerá conectado neste dispositivo.') }}</small>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-lg shadow-none" type="submit">{{ __('Entrar') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <div class="d-flex gap-2 flex-column flex-md-row justify-content-center">
                                        <a href="{{ route('register') }}" class="link-secondary text-decoration-none">{{ __('Crie sua conta') }}</a>
                                        <a href="{{ route('password.request') }}" class="link-secondary text-decoration-none">{{ __('Esqueceu sua senha') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
