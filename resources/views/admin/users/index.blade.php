@extends('components.layouts.admin')

@section('content')


<div>

    <div class="row">
        <div class="col">  <h1 class="mt-4">Usuários</h1></div>
    </div>

    <form action="{{route('admin.user.index')}}" method="get">
    <div class="row">


        <div class="col">
            <input type="text" class="form-control" placeholder="Pesquisar por nome" value="" name="search">
        </div>

        <div class="col">
            <button type="submit" class="btn btn-primary mb-4" ><i class="fa fa-search"></i> Buscar </button>
            <a href="{{route('admin.user.create')}}"  class="btn btn-success mb-4" ><i class="fa fa-plus"></i> Cadastrar novo</a>

        </div>

    </div>
</form>
    <table class="table table-responsive table-striped">
        <thead>
        <tr>

            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Tipo</th>

        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
        <tr>
            <td><a class="text-secondary" href="order/print/{{$item->id}}"> # {{$item->id}} </a></td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>

                @if($item->role_id == 1)
                    <span class="badge text-bg-primary">Administrador</span>
                @else
                    <span class="badge text-bg-secondary">Comum</span>
                @endif
            </td>

            <td>
                @if ($item->role_id == 1)
                <a class="btn btn-secondary disabled" href="#" disabled="disabled" > <i class="fa fa-pencil"></i> Editar</a>
                <a class="btn btn-secondary disabled" href="#" disabled="disabled"> <i class="fa fa-trash"></i> Excluir</a>
                    @else

                    <a class="btn btn-secondary" href="{{route('admin.user.edit', $item->id)}}" > <i class="fa fa-pencil"></i> Editar</a>
                    <a class="btn btn-danger" onclick="return confirm('Você tem certeza?')" href="{{route('admin.user.delete', $item->id)}}"> <i class="fa fa-trash"></i> Excluir</a>

                @endif

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
