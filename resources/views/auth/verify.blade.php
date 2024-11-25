@extends('layouts.app')

@section('content')
{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link. If you did not receive the email') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
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
                            
                            @if (session('resent'))
                                <div class="alert alert-success text-secondary text-center" role="alert">
                                    {{ __('Link reenviado! Verifique seu e-mail para acessar o novo link de verificação.') }}
                                </div>
                            @endif

                            <div class="col-12 mb-5">
                                <p class="h2 text-center">{{ __('Verifique seu e-mail') }}</p>
                                <h2 class="fs-5 fw-normal text-secondary text-center">{{ __('Verifique seu e-mail para acessar o link de verificação. Não recebeu?') }}</h2>
                            </div>

                            <form action="{{ route('verification.resend') }}" method="POST" class="requires-validation" novalidate>
                                @csrf
                                <div class="row gy-3 gy-md-4 overflow-hidden">
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-lg shadow-none" type="submit">{{ __('Clique aqui para reenviar.') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <div class="d-flex gap-2 flex-column flex-md-row justify-content-center">
                                        <a href="{{ route('logout') }}" class="link-secondary text-decoration-none classBtnLogout">{{ __('Encerrar sessão') }}</a>
                                        <!-- <a href="{{ route('password.request') }}" class="link-secondary text-decoration-none">{{ __('Configurações') }}</a> -->
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
