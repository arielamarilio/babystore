@extends('app-backend')

@section('content')

<div class="row">

	<div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="glyphicon glyphicon-star-empty pull-right"></i>
                    <h4>Produtos</h4>
                    <small>Todos os seus produtos :) </small>
                </div>
            </div>
            <div class="panel-body">
				<a href="{{ route('products.create',[ ]) }}" class="btn btn-default">Cadastrar</a>

				<br />
				&nbsp;

				<table class="table">
					<tbody>

					@foreach($products as $product)

					<tr>
						<td width="80px"><img src="http://placehold.it/80x80" class="img-thumbnail" alt=""></td>
						<td>
							<strong>{{ $product->title }}</strong> <br />
							<p>{{ $product->description }}</p>
							<b>Valor:</b> $24.99
						</td>
						<td width="90px">
							<a href="{{ route('products.edit',['id'=>$product->id]) }}" class="btn-sm btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							
							<a href="{{ route('products.destroy',['id'=>$product->id]) }}" class="btn-sm btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
						</td>
					</tr>

					@endforeach

					</tbody>
				</table>
            </div>
            <!--/panel content-->
        </div>
    </div>

</div>

@endsection