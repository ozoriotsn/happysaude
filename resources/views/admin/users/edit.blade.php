@extends('components.layouts.admin')

@section('content')
    <div>

        <div class="row">
            <div class="col">
                <h1 class="mt-4">Editar Usuário</h1>

            </div>
        </div>


        <div class="row">

            <form method="POST"  action="{{ route('admin.user.update', $user->id) }}" >
                @method('PUT')
                @csrf

                <div class="form-group mt-4">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name')?old('name'):$user->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group mt-4">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email')??$user->email }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group mt-4">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="••••••••">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>



                <div class="form-group mt-4  d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary " style="margin-right: 10px;">Salvar</button>
                    <a href="{{route('admin.user.index')}}" class="btn btn-secondary">Voltar</a>

                </div>


            </form>

        </div>

    </div>
@endsection
