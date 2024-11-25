@extends('layouts.app')

@section('content')
{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Endereço de email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Redefinir senha') }}
                                </button>
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
                        
                            <p class="h2 mb-4 text-center">{{ __('Redefinir senha') }}</p>
                            
                            <form action="{{ route('password.update') }}" method="POST" class="requires-validation" novalidate>
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">
                                
                                <div class="row gy-3 gy-md-4 overflow-hidden">

                                    <div class="col-12">
                                        <label for="email" class="form-label">{{ __('Email') }} <span class="text-danger">*</span></label>

                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                </svg>                                                
                                            </span>

                                            <input type="email" class="form-control shadow-none @error('email') is-invalid @enderror" id="email" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" required>

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

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-lg shadow-none" type="submit">{{ __('Redefinir senha') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{--
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <p class="m-0 text-secondary text-center">Já tem uma conta? <a href="{{ route('login') }}" class="link-primary text-decoration-none">{{ __('Entrar') }}</a></p>
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
