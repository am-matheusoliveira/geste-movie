@extends('layouts.app')

@section('content')
{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
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

                            <div class="col-12 mb-5">
                                <p class="h2 text-center">{{ __('Confirme sua senha') }}</p>
                                <h2 class="fs-5 fw-normal text-secondary text-center">Por favor, confirme sua senha antes de continuar.</h2>
                            </div>                            

                            <form action="{{ route('password.confirm') }}" method="POST" class="requires-validation" novalidate>
                                @csrf
                                <div class="row gy-3 gy-md-4 overflow-hidden">
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
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-lg shadow-none" type="submit">{{ __('Confirme sua senha') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <div class="d-flex gap-2 flex-column flex-md-row justify-content-center">
                                        @if (Route::has('password.request'))
                                            <a href="{{ url()->previous() }}" class="link-secondary text-decoration-none">{{ __('Retornar') }}</a>
                                            <a href="{{ route('password.request') }}" class="link-secondary text-decoration-none">{{ __('Esqueceu sua senha') }}</a>
                                        @endif                                                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
