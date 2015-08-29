@extends('app')

@section('content')
<div class="container">
	<h1>Marcas</h1>

	<a href="{{ route('brands.create',[ ]) }}" class="btn btn-default">Novo</a>

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

		@foreach($brands as $brand)

		<tr>
			<td>{{ $brand->id }}</td>
			<td>{{ $brand->name }}</td>
			<td>{{ $brand->description }}</td>
			<td>
				<a href="{{ route('brands.edit',['id'=>$brand->id]) }}" class="btn-sm btn-success">Editar</a>
				<a href="{{ route('brands.destroy',['id'=>$brand->id]) }}" class="btn-sm btn-danger">Remover</a>
			</td>
		</tr>

		@endforeach

		</tbody>
	</table>
</div>
@endsection