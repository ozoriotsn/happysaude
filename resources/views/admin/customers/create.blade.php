@extends('components.layouts.admin')

@section('content')
    <div>

        <div class="row">
            <div class="col">
                <h1 class="mt-4">Cadastrar Pessoa</h1>
            </div>
        </div>


        <div class="row">

            <form class="col" action="{{ route('admin.customer.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="email">Telefone</label>
                    <input type="text" name="phone" id="phone"
                        class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="email">Sexo</label>

                    <select name="sex" id="sex" class="form-control @error('sex') is-invalid @enderror">
                        <option value="">Selecione</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                    @error('sex')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group mt-4">
                    <label for="birthdate">Data de Nascimento</label>
                    <input type="date" name="birthdate" id="birthdate"
                        class="form-control @error('birthdate') is-invalid @enderror" value="{{ old('birthdate') }}">
                    @error('birthdate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                <div class="form-group mt-4">
                    <label for="photo">Foto</label>
                    <input type="file" name="photo" id="photo" accept=".jpg, .jpeg, .png"
                        class="form-control @error('photo') is-invalid @enderror">
                    @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>


                <div class="form-group mt-4">
                    <label for="zip_code">Cep</label>
                    <input type="text" name="zip_code" id="cep"
                        class="form-control @error('zip_code') is-invalid @enderror" value="{{ old('zip_code') }}" onblur="pesquisacep(this.value);">
                    @error('zip_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>


                <div class="form-group mt-4">
                    <label for="city">Cidade</label>
                    <input type="text" name="city" id="city"
                        class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}">
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>




                <div class="form-group mt-4">
                    <label for="state">Estado</label>

                    <select name="state" id="state" class="form-control @error('state') is-invalid @enderror">
                        <option value="">Selecione</option>

                        @foreach ($states as $state)
                            <option value="{{ $state->uf }}" {{ old('state') }}>{{ $state->name }}</option>
                        @endforeach


                    </select>


                </div>

                <div class="form-group mt-4  d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary " style="margin-right: 10px;">Cadastrar</button>
                    <a href="{{ route('admin.customer.index') }}" class="btn btn-secondary">Voltar</a>

                </div>


            </form>

        </div>

    </div>

    <script>

        function pesquisacep(value) {
            console.log('CEP: ', value);
            let cep = value
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => {
                    response.json()
                        .then(data => showData(data))
                })
                .catch(err => console.log(err))
        }

        function showData(data) {
            console.log('CEP DATA: ', data);
            $("#address").val(data.logradouro)
            $("#city").val(data.localidade)
            $("#state").val(data.uf)
        }
    </script>
@endsection
