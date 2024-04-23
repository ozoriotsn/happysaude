@extends('components.layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
{{--                    <div class="card-header">Resetar senha</div>--}}
                    <div class="card-body login-box">

                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <form method="POST" action="/customer/reset-password">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">


                            <div class="mb-3 text-center">
                                <i class="fa fa-user-lock fa-5x text-secondary"></i>
                            </div>


                            <div class="mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Nova senha</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirme sua senha</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>

                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-shop">
                                    Resetar senha
                                </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
