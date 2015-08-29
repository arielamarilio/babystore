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

		return view('products.create', ['categories' => $categories, 'brands' => $brands]);
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

	public function multiple_upload() {

		// getting all of the post data
		$files 			= Input::file('images');
		// Making counting of uploaded images
		$file_count 	= count($files);
		// start count how many uploaded
		$uploadcount 	= 0;

		foreach($files as $file) {
			
			$rules 		= array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
			$validator 	= Validator::make(array('file'=> $file), $rules);

			if($validator->passes()){
				$destinationPath 	= 'uploads';
				$filename 			= $file->getClientOriginalName();
				$upload_success 	= $file->move($destinationPath, $filename);
				$uploadcount ++;
			}

		}

		if($uploadcount == $file_count){
			Session::flash('success', 'Upload successfully'); 
			return Redirect::to('upload');
		} else {
			return Redirect::to('upload')->withInput()->withErrors($validator);
		}

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

	public function update(ProductsRequest $request, $id)
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
