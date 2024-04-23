@extends('components.layouts.admin')

@section('content')


<div>

    <div class="row">
        <div class="col">  <h1 class="mt-4">Cidades</h1></div>
    </div>

    <form action="{{route('admin.city.index')}}" method="get">
    <div class="row">


        <div class="col">
            <input type="text" class="form-control" placeholder="Pesquisar por nome" value="" name="search">
        </div>

        <div class="col">
            <button type="submit" class="btn btn-primary mb-4" ><i class="fa fa-search"></i> Buscar </button>
            <a href="{{route('admin.city.create')}}"  class="btn btn-success mb-4" ><i class="fa fa-plus"></i> Cadastrar novo</a>

        </div>

    </div>
</form>
    <table class="table table-responsive table-striped">
        <thead>
        <tr>

            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">UF</th>
            <th scope="col">Data</th>


        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
        <tr>
            <td><a class="text-secondary" href="{{route('admin.city.edit', $item->id)}}"> # {{$item->id}} </a></td>
            <td>{{$item->name}}</td>
            <td>{{$item->state->uf}}</td>
            <td>{{ date('d-m-Y',strtotime($item->created_at)) }}</td>

            <td>
                <a class="btn btn-secondary" href="{{route('admin.city.edit', $item->id)}}"> <i class="fa fa-pencil"></i> Editar</a>
                <a class="btn btn-danger" onclick="return confirm('Você tem certeza?')" href="{{route('admin.city.delete', $item->id)}}"> <i class="fa fa-trash"></i> Excluir</a>
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
