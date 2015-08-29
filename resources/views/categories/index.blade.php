@extends('app')

@section('content')
<div class="container">
	<h1>Categorias</h1>

	<a href="{{ route('categories.create',[ ]) }}" class="btn btn-default">Novo</a>

	<br />
	&nbsp;

	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>

		@foreach($categories as $categorie)

		<tr>
			<td>{{ $categorie->id }}</td>
			<td>{{ $categorie->name }}</td>
			<td>{{ $categorie->description }}</td>
			<td>
				<a href="{{ route('categories.edit',['id'=>$categorie->id]) }}" class="btn-sm btn-success">Editar</a>
				<a href="{{ route('categories.destroy',['id'=>$categorie->id]) }}" class="btn-sm btn-danger">Remover</a>
			</td>
		</tr>

		@endforeach

		</tbody>
	</table>
</div>
@endsection