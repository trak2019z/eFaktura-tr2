@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>{{ __('Potwierdź swój adres e-mail') }}</small>
                        </div>
                        <div>
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('Nowy link weryfikacyjny został wysłany.') }}
                                </div>
                            @endif
                            
                            {{ __('Zanim przejdziesz dalej, sprawdź swoją pocztę e-mail.') }}
                            
                            @if (Route::has('verification.resend'))
                                {{ __('Jeśli nie dostałeś żadnej wiadomości') }}, <a href="{{ route('verification.resend') }}">{{ __('kliknij tutaj, aby wysłać ponownie.') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
