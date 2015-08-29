@extends('app-backend')

@section('content')

<div class="basic-login">

	{!! Form::open(['route'=>'products.store', 'method' => 'post', 'files'=>true]) !!}

		<div class="col-md-12">
			<div class="form-group">
				{!! Form::label('title', 'Título do seu produto:') !!}
				{!! Form::text('title', null, ['class'=>'form-control']) !!}
			</div>
		</div>

		<div class="col-md-7">
			<div class="form-group">
				{!! Form::Label('categorie_id', 'Categoria:') !!}
				<select class="form-control" name="categorie_id">
					@foreach($categories as $item)
						<option value="{{$item->id}}">{{$item->name}}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				{!! Form::Label('brand_id', 'Marca:') !!}
				<select class="form-control" name="brand_id">
					@foreach($brands as $item)
						<option value="{{$item->id}}">{{$item->name}}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				{!! Form::Label('gender', 'Sexo:') !!}
				<select class="form-control" name="gender">
					<option value="male">Masculino</option>
					<option value="female">Feminino</option>
				</select>
			</div>

			<div class="form-group">
				{!! Form::Label('state', 'Estado:') !!}
				<select class="form-control" name="state">
					<option value="1">Novo</option>
					<option value="2">Pouco usado</option>
					<option value="3">Muito usado</option>
					<option value="4">Usado com muitas marcas</option>
				</select>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="form-group">
				{!! Form::label('price', 'Valor:') !!}
				{!! Form::text('price', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('monetary_discount', 'Desconto monetário:') !!}
				{!! Form::text('monetary_discount', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('percentage_discount', 'Desconto percentual:') !!}
				{!! Form::text('percentage_discount', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::Label('situation', 'Situação:') !!}
				<select class="form-control" name="situation">
					<option value="1">Normal</option>
					<option value="2">Reservado</option>
					<option value="3">Vendido</option>
					<option value="4">Cancelado</option>
				</select>
			</div>
		</div>

		<div class="col-md-2">
			&nbsp;
		</div>
		
		<div class="col-md-12">
			{!! Form::file('image[]', array('multiple'=>true)) !!}
			<br />
		</div>

		<div class="col-md-12">
			<div class="form-group">
			{!! Form::label('description', 'Descrição:') !!}
			{!! Form::textarea('description', null, ['class'=>'form-control']) !!}
			</div>
		</div>

		<div class="col-md-2">
			<div class="form-group">
			{!! Form::submit('Criar', ['class'=>'btn btn-primary']) !!}
			</div>
		</div>

	{!! Form::close() !!}

</div>

@endsection