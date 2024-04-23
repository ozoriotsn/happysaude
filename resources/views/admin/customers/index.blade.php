@extends('components.layouts.admin')

@section('content')


<div>

    <div class="row">
        <div class="col">  <h1 class="mt-4">Pessoas</h1></div>
    </div>

    <form action="{{route('admin.customer.index')}}" method="get">
    <div class="row">


        <div class="col">
            <input type="text" class="form-control" placeholder="Pesquisar por nome" value="" name="search">
        </div>

        <div class="col">
            <button type="submit" class="btn btn-primary mb-4" ><i class="fa fa-search"></i> Buscar </button>
            <a href="{{route('admin.customer.export')}}"  class="btn btn-warning mb-4" ><i class="fa fa-file"></i> Baixar Relatório</a>
            <a href="{{route('admin.customer.create')}}"  class="btn btn-success mb-4" ><i class="fa fa-plus"></i> Cadastrar novo</a>

        </div>

    </div>
</form>
    <table class="table table-responsive table-striped">
        <thead>
        <tr>

            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Foto</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Sexo</th>
            <th scope="col">Telefone</th>
            <th scope="col">Cep</th>
            <th scope="col">Cidade</th>
            <th scope="col">Estado</th>

        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
        <tr>
            <td><a class="text-secondary" href="order/print/{{$item->id}}"> # {{$item->id}} </a></td>
            <td>{{$item->name}}</td>
            <td><img src="{{asset('/')}}image/{{$item->photo}}" width="50" height="50" alt=""></td>
            <td>{{ date('d-m-Y',strtotime($item->birthdate)) }}</td>
            <td>{{$item->sex}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->zip_code}}</td>
            <td>{{$item->city}}</td>
            <td>{{$item->state}}</td>

            <td>
                <a class="btn btn-secondary" href="{{route('admin.customer.edit', $item->id)}}"> <i class="fa fa-pencil"></i> Editar</a>
                <a class="btn btn-danger" onclick="return confirm('Você tem certeza?')" href="{{route('admin.customer.delete', $item->id)}}"> <i class="fa fa-trash"></i> Excluir</a>
            </td>

        </tr>
        @endforeach
        </tbody>
    </table>

    <p>
        {{ $data->links() }}
    </p>

</div>


@endsection
