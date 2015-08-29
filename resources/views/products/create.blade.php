@extends('app-backend')

@section('content')

<script src="/js/jquery.maskMoney.js" type="text/javascript"></script>

<div class="basic-login">

	<h3 class="heading_a uk-margin-bottom">Cadastrar produtos</h3>

	{!! Form::open(array('route' => ['products.store'], 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal', 'files'=>true)) !!}

		<div class="uk-form-row">
			<div class="md-input-wrapper">
				<label>Título	:</label>
				<input type="text" class="md-input" name="title">
				<span class="md-input-bar"></span>

				<span class="uk-form-help-block">Dê um título amigável</span>
			</div>
		</div>
		<div class="uk-form-row">
			<div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-5-10">

                	<label>Categoria:</label>
                	<select id="categorie_id" name="categorie_id" data-md-selectize>
                        <option value="">Selectione ...</option>
                        @foreach($categories as $item)
							<option value="{{$item->id}}">{{$item->name}}</option>
						@endforeach
                    </select>

				</div>
				<div class="uk-width-medium-5-10">
					<label>Marca:</label>
                	<select id="brand_id" name="brand_id" data-md-selectize>
                        <option value="">Selectione ...</option>
                        @foreach($brands as $item)
							<option value="{{$item->id}}">{{$item->name}}</option>
						@endforeach
                    </select>
				</div>
        </div>	
        <div class="uk-form-row">
			<div class="uk-grid" data-uk-grid-margin>
				<div class="uk-width-medium-5-10">
					<label for="phone">Sexo</label>

					<br />

					<input type="radio" name="gender" id="gender_1" data-md-icheck />
                    <label for="gender_1" class="inline-label">Masculino</label>

                    <input type="radio" name="gender" id="gender_2" data-md-icheck />
                    <label for="gender_2" class="inline-label">Feminino</label>

					<input type="radio" name="gender" id="gender_3" data-md-icheck />
                    <label for="gender_3" class="inline-label">Ambos</label>
                </div>

                <div class="uk-width-medium-5-10">

                	<label>Estado:</label>
                	<select id="state" name="state" data-md-selectize>
                        <option value="1">Novo</option>
                        <option value="2">Pouco usado</option>
                        <option value="3">Muito usado</option>
                        <option value="4">Muito usado com marcas</option>
                    </select>

                </div>
            </div>	
        </div>	

        <div class="uk-form-row">
			<div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-5-10">

                	<label>Preço original:</label>
                	<input type="text" class="md-input" name="origin_price" id="origin_price">
					<span class="md-input-bar"></span>

					<span class="uk-form-help-block">Quanto pagou por ele?</span>

				</div>
				<div class="uk-width-medium-5-10">
					
					<label>Preço de venda:</label>
                	<input type="text" class="md-input" name="sale_price" id="sale_price">
					<span class="md-input-bar"></span>

					<span class="uk-form-help-block">Por quanto quer vender?</span>

				</div>
        </div>	

        <div class="uk-form-row">
            <label>Detalhes</label>
            <textarea cols="30" rows="1" class="md-input"></textarea>
            <span class="uk-form-help-block">Conte-nos um pouco sobre o seu produto</span>
        </div>

		<!--
		
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

		<div class="col-md-2">
			<div class="form-group">
			{!! Form::submit('Criar', ['class'=>'btn btn-primary']) !!}
			</div>
		</div>
		-->

	{!! Form::close() !!}

</div>

<script type="text/javascript">
	$(document).ready(function($){
	    $("#origin_price").maskMoney({
	    	prefix:'R$ ',
			symbol: 'R$ ', 
			showSymbol: true, 
			thousands: '.', 
			decimal: ',', 
			symbolStay: true
		});
    });
</script>

@endsection