@extends('app-backend')

@section('content')

<link rel="stylesheet" href="/plugins/dropzone/dropzone.css">

<script src="/js/jquery.maskMoney.js" type="text/javascript"></script>
<script src="/plugins/dropzone/dropzone.js"></script>

<div class="basic-login">

	<h3 class="heading_a uk-margin-bottom">Cadastrar produtos</h3>

	{!! Form::open(array('route' => ['products.update'], 'id' => 'product_form', 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal', 'files'=>true)) !!}

		<input type="hidden" name="id" value="{{ $product->id }}" > 
		<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

		<div class="uk-form-row">
			<div class="md-input-wrapper">
				<label>Título	:</label>
				<input type="text" class="md-input" name="title" onblur="javascript:save();">
				<span class="md-input-bar"></span>

				<span class="uk-form-help-block">Dê um título amigável</span>
			</div>
		</div>
		<div class="uk-form-row">
			<div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-5-10">

                	<label>Categoria:</label>
                	<select id="categorie_id" name="categorie_id" data-md-selectize onchange="javascript:save();">
                        <option value="">Selectione ...</option>
                        @foreach($categories as $item)
							<option value="{{$item->id}}">{{$item->name}}</option>
						@endforeach
                    </select>

				</div>
				<div class="uk-width-medium-5-10">
					<label>Marca:</label>
                	<select id="brand_id" name="brand_id" data-md-selectize onchange="javascript:save();">
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
					<label for="radio">Sexo</label>

					<br />

					<input type="radio" name="gender" id="gender_1" value="male" onclick="javascript:save();" data-md-icheck />
                    <label for="gender_1" class="inline-label">Masculino</label>

                    <input type="radio" name="gender" id="gender_2" value="female" onclick="javascript:save();" data-md-icheck />
                    <label for="gender_2" class="inline-label">Feminino</label>

					<input type="radio" name="gender" id="gender_3" value="both" onclick="javascript:save();" data-md-icheck />
                    <label for="gender_3" class="inline-label">Ambos</label>
                </div>

                <div class="uk-width-medium-5-10">

                	<label>Estado:</label>
                	<select id="state" name="state" data-md-selectize onchange="javascript:save();">
                		<option value="">Selectione ...</option>
                        <option value="1">Novo</option>
                        <option value="2">Pouco usado</option>
                        <option value="3">Muito usado</option>
                        <option value="4">Muito usado com marcas</option>
                    </select>

                </div>
            </div>	
        </div>	

        <div class="uk-form-row  md-input-filled">
			<div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-5-10 ">
                	<label>Preço original:</label>
                	<input type="text" class="md-input" name="original_price" id="original_price" onblur="javascript:save();">
					<span class="md-input-bar"></span>

					<span class="uk-form-help-block">Quanto pagou por ele?</span>
				</div>
				<div class="uk-width-medium-5-10">	
					<label>Preço de venda:</label>
                	<input type="text" class="md-input" name="sale_price" id="sale_price" onblur="javascript:save();">
					<span class="md-input-bar"></span>

					<span class="uk-form-help-block">Por quanto quer vender?</span>
				</div>
			</div>
        </div>	

        <div class="uk-form-row">
            <label>Formas de entrega:</label>
            <p>
                <input type="checkbox" name="delivery_method[]" id="delivery_method_1" data-md-icheck value="1" onchange="javascript:save();" />
                <label for="delivery_method_1" class="inline-label">Correios</label>

                <input type="checkbox" name="delivery_method[]" id="delivery_method_2" data-md-icheck value="2" onchange="javascript:save();" />
                <label for="delivery_method_2" class="inline-label">Aceito retirar no meu local</label>

                <input type="checkbox" name="delivery_method[]" id="delivery_method_3" data-md-icheck value="3" onchange="javascript:save();" />
                <label for="delivery_method_3" class="inline-label">Entrega em domicílio</label>

                <input type="checkbox" name="delivery_method[]" id="delivery_method_4" data-md-icheck value="4" onchange="javascript:save();" />
                <label for="delivery_method_4" class="inline-label">Outro</label>
            </p>
            <span class="uk-form-help-block">Você pode selecionar mais de um local de entrega</span>
        </div>

        <div class="uk-form-row">
            <label>Detalhes:</label>
            <textarea cols="30" rows="1" name="description" class="md-input" onblur="javascript:save();"></textarea>
            <span class="uk-form-help-block">Conte-nos um pouco sobre o seu produto</span>
        </div>

        <hr />


        <!-- <div class="dropzone dropzone-previews" id="my-awesome-dropzone"></div> -->

        <div class="dropzone" id="images"></div>

        <hr />

        <div class="uk-form-row ">
			<a href="#" class="btn btn-info btn-lg">
				<span class="glyphicon glyphicon-ok"></span> Salvar
			</a>

			<a href="#" class="btn btn-success btn-lg">
				<span class="glyphicon glyphicon-bullhorn"></span> Salvar e publicar no site
			</a>

			<a href="#" class="btn btn-warning btn-lg">
				<span class="glyphicon glyphicon-remove"></span> Cancelar 
			</a>

		</div>


		<!--

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

		var _Url 	= "{{ route('products.upload') }}";
        var token 	= "{{ Session::getToken() }}";
        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone("div#images", {
            url: _Url,
            params: {
                _token: token
            }
        });
        Dropzone.options.myAwesomeDropzone = {
            paramName: "images", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            addRemoveLinks: true,
            accept: function(file, done) {
 
            },
        };

	    $("#original_price").maskMoney({
	    	prefix:'R$ ',
			symbol: 'R$ ', 
			showSymbol: true, 
			thousands: '.', 
			decimal: ',', 
			symbolStay: true
		});
		$("#sale_price").maskMoney({
	    	prefix:'R$ ',
			symbol: 'R$ ', 
			showSymbol: true, 
			thousands: '.', 
			decimal: ',', 
			symbolStay: true
		});
    });
    function save(){
    	$.ajax({
		    url: $('#product_form').attr('action'),
		    type: 'POST',
		    data: $('#product_form').serialize(),
		    success: function(result) { }
		});
    }
</script>
<!-- <script src="/theme/altair/assets/js/pages/forms_file_upload.min.js"></script> -->

@endsection