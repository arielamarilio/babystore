<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Brands;
use App\Categories;
use App\Products;

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
		$categories = Categories::all(['id', 'name']);
		$brands 	= Brands::all(['id', 'name']);

		$product 	= new Products();
		$product->save();

		return view('products.create', ['categories' => $categories, 'brands' => $brands, 'product' => $product]);
	}

	public function store(ProductsRequest $request)
	{

		$user = Auth::user();

		$product 						= new Products();
		$product->categorie_id 			= $request->get('categorie_id');
		$product->brand_id 				= $request->get('brand_id');
		$product->title 				= $request->get('title');
		$product->description 			= $request->get('description');	
		$product->gender 				= $request->get('gender');
		$product->state 				= $request->get('state');
		$product->price 				= $request->get('state');
		$product->monetary_discount 	= (!empty($request->get('monetary_discount'))) ? $request->get('monetary_discount') : 0; 
		$product->percentage_discount 	= (!empty($request->get('percentage_discount'))) ? $request->get('percentage_discount') : 0;
		$product->situation 			= $request->get('situation');
		$product->user_id 				= $user->id;
		$product->save();

		$images 		= Input::file('image');
		$images_count 	= count($images);
		$upload_count 	= 0;

		foreach($images as $image) {
			
			$rules 		= array('file' => 'required'); // 'required|mimes:png,gif,jpeg,txt,pdf,doc'
			$validator 	= Validator::make(array('file'=> $image), $rules);

			if($validator->passes()){

				$path = public_path() . '/images/products/' . $product->id . '/';

				if( !is_dir( $path ) )
					mkdir( $path );

				$extension 			= $image->getClientOriginalExtension();
				$file_name 			= 'product_' . $product->id . '_' . $upload_count . '.' . $extension;
				$upload_success 	= $image->move($path, $file_name);
				$upload_count ++;
			}

		}

		return redirect()->route('products');
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

		$delivery_method = $request->get('delivery_method');
		if(!empty($delivery_method)){
			
			$product->delivery_method = "";

			foreach ($delivery_method as $method) {
				$product->delivery_method .= $method;
			}
		}

		$product->user_id 				= $user->id;

		$product->save();
		
	}

	public function upload_get()
	{
		return view('products.upload_get');
	}

	public function upload_post() {

		ini_set("display_errors", true);

		// $input = Input::all();
		// $rules = array(
		//     'file' => 'image|max:3000',
		// );

		// $validation = Validator::make($input, $rules);

		// if ($validation->fails())
		// {
		// 	return Response::make($validation->errors->first(), 400);
		// }

		// $file = Input::file('file');

  //       $extension 	= File::extension($file['name']);
  //       $directory 	= public_path() . '/images/products/';
  //       $filename 	= sha1(time().time()).".{$extension}";

  //       $upload_success = Input::upload('file', $directory, $filename);

  //       if( $upload_success ) {
  //       	return Response::json('success', 200);
  //       } else {
  //       	return Response::json('error', 400);
  //       }








		$path = public_path() . '/images/products/';

		if( !is_dir( $path ) )
			mkdir( $path );

		$destination_path 	= $path;
		$extension 			= Input::file('file')->getClientOriginalExtension();
		$file_name 			= 'upload.' . $extension;
		$upload_success 	= Input::file('file')->move($destination_path, $file_name);

		if($upload_success)
			echo "OK!";
	}

	public function destroy($id)
	{
		Products::find($id)->delete();
		return redirect()->route('products');
	}

	public function edit($id)
	{
		$products = Products::find($id);
		return view('products.edit', compact('products'));
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
