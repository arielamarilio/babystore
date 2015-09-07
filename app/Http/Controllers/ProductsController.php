<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Brands;
use App\Categories;
use App\Products;
use App\ProductsImages;

use Auth;

use App\Http\Requests\ProductsRequest;

use Input;
use Validator;
use Redirect;
use Request;
use Session;

class ProductsController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$products = Products::all();
		return view('products.index', ['products' => $products]);
	}

	public function create(Request $request)
	{
		$product 	= new Products();
		$product->save();

		return redirect()->route('products.edit', [$product->id]);
	}
	public function edit($id)
	{
		$categories = Categories::all(['id', 'name']);
		$brands 	= Brands::all(['id', 'name']);
		$product 	= Products::find($id);

		return view('products.edit', ['categories' => $categories, 'brands' => $brands, 'product' => $product]);
	}

	public function internal_update(ProductsRequest $request)
	{ 
		ini_set("display_errors", true);

		$user 		= Auth::user();
		$product 	= Products::find($request->get('id'));
		
		if(!empty($request->get('categorie_id')))
			$product->categorie_id = $request->get('categorie_id');

		if(!empty($request->get('brand_id')))
			$product->brand_id = $request->get('brand_id');

		if(!empty($request->get('title')))
			$product->title = $request->get('title');

		if(!empty($request->get('description')))
			$product->description = $request->get('description');

		if(!empty($request->get('gender')))
			$product->gender = $request->get('gender');

		if(!empty($request->get('state')))
			$product->state = $request->get('state');

		if(!empty($request->get('original_price')))
			$product->original_price = str_replace(",", ".", str_replace(".", "", str_replace("R$ ", "", $request->get('original_price'))));

		if(!empty($request->get('sale_price')))
			$product->sale_price = str_replace(",", ".", str_replace(".", "", str_replace("R$ ", "", $request->get('sale_price'))));

		if(!empty($request->get('situation')))
			$product->situation = $request->get('situation');

		if(!empty($request->get('size')))
			$product->size = $request->get('size');

		$delivery_method = $request->get('delivery_method');
		if(!empty($delivery_method)){
			
			$product->delivery_method = "";

			foreach ($delivery_method as $method) {
				$product->delivery_method .= $method;
			}
		}

		$product->user_id = $user->id;

		$product->save();
		
	}

	public function get_images($idProduct){
		$product 		= Products::find($idProduct);
		$product_images = $product->images;
		$data_return 	= array();
		$cont 			= 0;

		foreach ($product_images as $image) {
			$data_return[$cont]['id'] 	= $image->id;
			$data_return[$cont]['name'] = $image->name;
			$data_return[$cont]['dir'] 	= '/images/products/' . $idProduct . '/';
			$data_return[$cont]['size'] = $image->size;

			$cont++;
		}

		echo json_encode($data_return);
	}

	public function upload_post(ProductsRequest $request) {

		ini_set("display_errors", true);

		$idProduct 		= $request->get('idProduct');
		$path 			= public_path() . '/images/products/' . $idProduct . '/';

		$product 		= Products::find($idProduct);

		if( !is_dir( $path ) )
			mkdir( $path );

		$destination_path 	= $path;
		$extension 			= Input::file('file')->getClientOriginalExtension();
		$file_name 			= $idProduct . '_product_' . date('YmdHis') .'.' . $extension;
		$upload_success 	= Input::file('file')->move($destination_path, $file_name);


		$productImg 				= new ProductsImages();	
		$productImg->products_id 	= $idProduct;
		$productImg->image 			= $destination_path . $file_name;
		$productImg->name 			= $file_name;
		$productImg->dir 			= $destination_path;
		$productImg->size 			= Input::file('file')->getClientSize();
		$productImg->description	= '';
		$productImg->state 			= 1;
		$productImg->save();

		if($upload_success)
			echo json_encode( array('success'=>true, 'serverFileName' => $file_name, 'idProductImg' => $productImg->id) );
	
	}

	public function remove_upload(ProductsRequest $request) {

		$idProduct 		= $request->get('idProduct');
		$serverFileName = $request->get('serverFileName');
		$idProductImg 	= $request->get('idProductImg');
		$path 			= public_path() . '/images/products/' . $idProduct . '/';

		unlink($path . $serverFileName);

		ProductsImages::find($idProductImg)->delete();

		echo json_encode( array('success'=>true) );

	}

	public function destroy($id)
	{
		Products::find($id)->delete();
		return redirect()->route('products');
	
	}

	public function update2(ProductsRequest $request, $id)
	{

		$product 				= Products::find($id);
		$product->name 		= $request->get('name');
		$product->description = $request->get('description');	

		if (Input::hasFile('image') &&  Input::file('image')->isValid() ) {

			$path = public_path() . '/images/products/' . $id . '/';

			if( !is_dir( $path ) )
				mkdir( $path );

			$destination_path 	= $path;
			$extension 			= Input::file('image')->getClientOriginalExtension();
			$file_name 			= 'products_' . $id . '.' . $extension;
			$upload_success 	= Input::file('image')->move($destination_path, $file_name);

			if($upload_success)
				$product->image = '/images/products/' . $id . '/' . $file_name;

		}
		$product->save();
		return redirect()->route('products');
	
	}

}
