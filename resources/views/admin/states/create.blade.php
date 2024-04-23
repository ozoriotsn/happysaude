@extends('components.layouts.admin')

@section('content')
    <div>

        <div class="row">
            <div class="col">
                <h1 class="mt-4">Cadastrar Estado</h1>
            </div>
        </div>


        <div class="row">

            <form class="col" action="{{ route('admin.state.store') }}" method="POST" >
                @csrf

                <div class="form-group mt-4">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group mt-4">
                    <label for="email">UF</label>
                    <input type="text" name="uf" id="uf"
                        class="form-control @error('uf') is-invalid @enderror" value="{{ old('uf') }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group mt-4  d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary " style="margin-right: 10px;">Cadastrar</button>
                    <a href="{{route('admin.state.index')}}" class="btn btn-secondary">Voltar</a>

                </div>


            </form>

        </div>

    </div>
@endsection
