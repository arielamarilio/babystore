@extends('app-backend')

@section('content')

<link rel="stylesheet" href="/plugins/dropzone/dropzone.css">

<script src="/js/jquery.maskMoney.js" type="text/javascript"></script>
<script src="/plugins/dropzone/dropzone.js"></script>

<div class="basic-login">

	<div class="col-md-6">
		<h1>Meu produto</h1>	
	</div>
	<div class="col-md-6" style="text-align: right;">
		<a href="{{ route('products') }}" id="salvar" onclick="javascript:save();" class="btn btn-warning btn-lg">
			<span class="fa fa-reply-all"></span> Voltar aos meus produtos
		</a>
	</div>

	<br /><br />

	{!! Form::open(array('route' => ['products.update'], 'id' => 'product_form', 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal', 'files'=>true)) !!}

		<input type="hidden" name="id" value="{{ $product->id }}" > 
		<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

		<br /><br />

		<div class="uk-form-row">
			<div class="md-input-wrapper <?php if(!empty($product->title)) { echo "md-input-filled"; } ?>">
				<label>Título do produto:</label>
				<input type="text" class="md-input" name="title" onblur="javascript:save();" value="{{ $product->title }}">
				<span class="md-input-bar"></span>

				<span class="uk-form-help-block">Dê um título amigável ao seu produto</span>
			</div>
		</div>

		<div class="uk-form-row">
			<div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-5-10">

                	<label>Categoria do produto:</label>
                	<select id="categorie_id" name="categorie_id" data-md-selectize onchange="javascript:save();">
                        <option value="">Selectione ...</option>
                        @foreach($categories as $item)
							<option value="{{$item->id}}" <?php if($product->categorie_id == $item->id) { echo "selected"; } ?> >{{$item->name}}</option>
						@endforeach
                    </select>

                    <br/>

                    <label>Marca do produto:</label>
                    <input type="text" class="md-input" name="brand" onblur="javascript:save();" value="{{ $product->brand }}">

                    <br>

                    <label>Estado do produto:</label>
	                <select id="state" name="state" data-md-selectize onchange="javascript:save();">
                		<option value="">Selectione ...</option>
                        <option value="1" <?php if($product->state == '1') { echo "selected"; } ?> >Novo</option>
                        <option value="2" <?php if($product->state == '2') { echo "selected"; } ?>>Pouco usado</option>
                        <option value="3" <?php if($product->state == '3') { echo "selected"; } ?>>Muito usado</option>
                        <option value="4" <?php if($product->state == '4') { echo "selected"; } ?>>Muito usado com marcas</option>
                    </select>

				</div>
				<div class="uk-width-medium-5-10">
					<label>Tamanho do produto:</label>
                	<input type="text" class="md-input" name="size" onblur="javascript:save();" value="{{ $product->size }}">
                	<span class="uk-form-help-block">Use letras ou números</span>

                    <br />

                    <label>Preço original do produto:</label>
                	<input type="text" class="md-input" name="original_price" id="original_price" value="<?php if(!empty($product->original_price)) { echo "R$ " . number_format($product->original_price, 2, ",", "."); } ?>" onblur="javascript:save();">
					<span class="md-input-bar"></span>

					<span class="uk-form-help-block">Quanto pagou por ele?</span>

					<br />

					<label>Preço de venda do produto:</label>
                	<input type="text" class="md-input" name="sale_price" id="sale_price" value="<?php if(!empty($product->sale_price)) { echo "R$ " . number_format($product->sale_price, 2, ",", "."); } ?>" onblur="javascript:save();">
					<span class="md-input-bar"></span>

					<span class="uk-form-help-block">Por quanto quer vender?</span>

				</div>
			</div>
        </div>	

        <div class="uk-form-row">
        	 <div class="uk-grid" data-uk-grid-margin>
	            <div class="uk-width-medium-5-10">
	            	<div class="uk-form-row">
	            		<label for="radio">Serve em:</label>

						<br />

						<input type="radio" name="gender" id="gender_1" value="male" <?php if($product->gender == 'male') { echo "checked"; } ?> onclick="javascript:save();" data-md-icheck />
	                    <label for="gender_1" class="inline-label">Meninos</label>

	                    <input type="radio" name="gender" id="gender_2" value="female" <?php if($product->gender == 'female') { echo "checked"; } ?> onclick="javascript:save();" data-md-icheck />
	                    <label for="gender_2" class="inline-label">Meninas</label>

						<input type="radio" name="gender" id="gender_3" value="both" <?php if($product->gender == 'both') { echo "checked"; } ?> onclick="javascript:save();" data-md-icheck />
	                    <label for="gender_3" class="inline-label">Ambos</label>

	                	<br />

			            <label>Detalhes do produto:</label>
			            <textarea cols="30" rows="1" name="description" class="md-input" onblur="javascript:save();">{{ $product->description }}</textarea>
			            <span class="uk-form-help-block">Conte-nos um pouco sobre o seu produto</span>
			        </div>
				</div>
				<div class="uk-width-medium-5-10 <?php if(!empty($product->sale_price)) { echo "md-input-filled"; } ?>">	
					<div class="uk-form-row">
			            <div class="dropzone" id="images"></div>
			        </div>
				</div>
			</div>
        </div>
       
       	<div class="uk-form-row">
            <label>Formas de entrega:</label>
            	<br />
                <input type="checkbox" name="delivery_method[]" id="delivery_method_1" data-md-icheck value="1" <?php if(strpos($product->delivery_method, '1') !== false) { echo "checked"; } ?> onchange="javascript:save();" />
                <label for="delivery_method_1" class="inline-label">Correios</label>

                <input type="checkbox" name="delivery_method[]" id="delivery_method_2" data-md-icheck value="2" <?php if(strpos($product->delivery_method, '2') !== false) { echo "checked"; } ?> onchange="javascript:save();" />
                <label for="delivery_method_2" class="inline-label">Aceito retirar no meu local</label>

                <input type="checkbox" name="delivery_method[]" id="delivery_method_3" data-md-icheck value="3" <?php if(strpos($product->delivery_method, '3') !== false) { echo "checked"; } ?> onchange="javascript:save();" />
                <label for="delivery_method_3" class="inline-label">Entrega em domicílio</label>

                <input type="checkbox" name="delivery_method[]" id="delivery_method_4" data-md-icheck value="4" <?php if(strpos($product->delivery_method, '4') !== false) { echo "checked"; } ?> onchange="javascript:save();" />
                <label for="delivery_method_4" class="inline-label">A negociar</label>
            </p>
            <span class="uk-form-help-block">Você pode selecionar mais de um local de entrega</span>
        </div>	

        <hr />

        <div class="uk-form-row " style="text-align: right;">
			<a href="#salvar" id="salvar" onclick="javascript:save();" class="btn btn-info btn-lg">
				<span class="glyphicon glyphicon-floppy-saved"></span> Salvar alterações
			</a>

			<a href="{{ route('products') }}" id="salvar" onclick="javascript:save();" class="btn btn-success btn-lg">
				<span class="glyphicon glyphicon-floppy-saved"></span> Finalizar alterações
			</a>

			<a href="{{ route('products.destroy', ['id' => $product->id]) }}" class="btn btn-danger btn-lg">
				<span class="glyphicon glyphicon-trash"></span> Excluir produto
			</a>
		</div>

	{!! Form::close() !!}

</div>



<script type="text/javascript">
	$(document).ready(function($){

		var _UrlAdd				= "{{ route('products.upload') }}";
		var _UrlRemove			= "{{ route('products.remove_upload') }}";
		var _UrlGetExistingImg	= "{{ route('products.get_images',['id'=>$product->id]) }}";
        var token 				= "{{ Session::getToken() }}";
        var idProduct 			= "{{ $product->id }}";
        Dropzone.autoDiscover 	= false;

		var previewTemplate	= '<div class="dz-preview dz-image-preview">';
		previewTemplate = previewTemplate + '<div class="dz-image"><img data-dz-thumbnail /><div class="dz-error-mark"><img src="/images/error.png" /></div></div> ';
		previewTemplate = previewTemplate + '<div class="dz-error-message" style="margin-top: 20px;"><span data-dz-errormessage></span></div>';
		previewTemplate = previewTemplate + '</div>';

        var myDropzone = new Dropzone("div#images", {
            url: _UrlAdd,
            maxFilesize: '2',
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
		    dictDefaultMessage: '<a class="btn btn-sq btn-info"><i class="fa fa-picture-o fa-5x"></i><br/>Fotos</a>',
		    dictFileTooBig:  'O arquivo é muito grande, o tamanho máximo permitido é de 2Mb.',
		    dictCancelUpload:  'Cancelar o envio',
		    dictCancelUploadConfirmation:  'Tem certeza de que deseja cancelar este carregamento?',
		    dictRemoveFile:  'Excluir',
		    addRemoveLinks: true,
		    previewTemplate: previewTemplate,
		    // previewsContainer: "#previews",
			removedfile: function(file) {
				if(typeof file.serverFileName != 'undefined') {
					$.ajax({
				        type: 'POST',
				        url: _UrlRemove,
				        data: { serverFileName: file.serverFileName, idProductImg: file.idProductImg, _token: token, idProduct: idProduct },
				        dataType: 'html'
				    });
				}
				var _ref;
				return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
			},
			init: function() {
				thisDropzone = this;

				this.on("success", function(file, server_return) {
					var serverReturn 	= JSON.parse(server_return);
					file.serverFileName = serverReturn.serverFileName;
					file.idProductImg 	= serverReturn.idProductImg;
                });

                this.on("complete", function(file, server_return) {
					// console.log('complete');
                });

				$.getJSON(_UrlGetExistingImg, function(data) {
					$.each(data, function(index, val) {

						var mockFile = { name: val.name, size: val.size, serverFileName: val.name, idProductImg: val.id };

						thisDropzone.emit("addedfile", mockFile);
						thisDropzone.emit("thumbnail", mockFile,  val.dir + val.name);
						thisDropzone.files.push(mockFile);
					});
				});
			},
            params: {
            	idProduct: idProduct,
                _token: token
            }
        });
        Dropzone.options.myAwesomeDropzone = {
            paramName: "images",
            maxFilesize: 5,
            addRemoveLinks: true,
            accept: function(file, done) {
 
            }
        };

	    $("#original_price").maskMoney({ prefix:'R$ ', symbol: 'R$ ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true });
		$("#sale_price").maskMoney({ prefix:'R$ ', symbol: 'R$ ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true });
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