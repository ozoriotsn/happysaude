@extends('components.layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">

{{--                    <div class="card-header">Resetar senha adm</div>--}}
                    <div class="card-body login-box">

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form method="POST" action="{{route('admin.forget.pasword')}}">
                            @csrf

                            <div class="mb-3 text-center">
                                <i class="fa fa-user-lock fa-5x text-secondary"></i>
                            </div>

                            <div class="mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Digite seu email aqui">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-shop">
                                    {{'Enviar link de redefinição de senha'}}
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
