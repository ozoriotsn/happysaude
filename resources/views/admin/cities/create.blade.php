@extends('components.layouts.admin')

@section('content')
    <div>

        <div class="row">
            <div class="col">
                <h1 class="mt-4">Cadastrar Cidade</h1>
            </div>
        </div>


        <div class="row">

            <form class="col" action="{{ route('admin.city.store') }}" method="POST" >
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
                    <label for="state">Estado</label>

                    <select name="state_id" id="state" class="form-control @error('state') is-invalid @enderror">
                    <option value="">Selecione</option>

                    @foreach ($states as $state)
                        <option value="{{$state->id}}" {{ old('state')}}>{{$state->name}}</option>
                    @endforeach


                    </select>


                </div>


                <div class="form-group mt-4  d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary " style="margin-right: 10px;">Cadastrar</button>
                    <a href="{{route('admin.city.index')}}" class="btn btn-secondary">Voltar</a>

                </div>


            </form>

        </div>

    </div>
@endsection
