@extends('app-backend')

@section('content')

<div class="row basic-login">

	<div class="col-md-6">
		<h1>Meus produtos</h1>	
	</div>
	<div class="col-md-6" style="text-align: right;">
		<a href="{{ route('products.create',[ ]) }}" class="btn btn-sq-sm btn-warning"><i class="fa fa-plus fa-2x"></i><br/>Novo</a>
		<br /><br />
	</div>

	<div class="col-md-12">

		<table class="table table-hover">
		<thead>
			<tr>
				<th width="80px"></th>
				<th>Título</th>
				<th>Marca</th>
				<th>Tamanho</th>
				<th width="130px">Preço original</th>
				<th width="130px">Preço de venda</th>
				<th width="80px">Ações</th>
			</tr>
		</thead>
			<tbody>
				@foreach($products as $product)
				<tr>
					<th scope="row"> 
						<?php 
							if(sizeof($product->images) > 0) {
						?>
							<img src="<?php echo '/images/products/' . $product->id . '/' . $product->images[0]['name'] ?>" width="40px" height="40px" class="img-thumbnail" alt="" /> 
						<?php 
							} else {
								?>
								<img data-src="holder.js/40x40" class="img-thumbnail" alt="40x40" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNGZhOTJjMjBiYSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE0ZmE5MmMyMGJhIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA3ODEyNSIgeT0iNzQuNjczNDM3NSI+MTQweDE0MDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="width: 40px; height: 40px;">
								<?php
							}
						?>
					</th>
					<td>
						<div class="cart-item-title"><a href="{{ route('products.edit',['id'=>$product->id]) }}">{{ $product->title }}</a></div>
					</td>
					<td>
						{{ $product->brand }}
					</td>
					<td>
						{{ $product->size }}
					</td>
					<td>
						<?php if(!empty($product->original_price)) { echo "R$ " . number_format($product->original_price, 2, ",", "."); } ?>
					</td>
					<td>
						<?php if(!empty($product->sale_price)) { echo "R$ " . number_format($product->sale_price, 2, ",", "."); } ?>
					</td>
					<td>
						<a href="{{ route('products.edit',['id'=>$product->id]) }}" class="btn btn-xs btn-grey"><i class="glyphicon glyphicon-pencil"></i></a>
						<a href="{{ route('products.destroy',['id'=>$product->id]) }}" class="btn btn-xs btn-grey"><i class="glyphicon glyphicon-trash"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection