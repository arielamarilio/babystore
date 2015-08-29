<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Brands;
use App\Http\Requests\BrandsRequest;

use Input;
use Validator;
use Redirect;
use Request;
use Session;

class BrandsController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$brands = Brands::all();
		return view('brands.index', ['brands' => $brands]);
	}

	public function create()
	{
		return view('brands.create');
	}

	public function store(BrandsRequest $request)
	{

		$brand 				= new Brands();
		$brand->name 		= $request->get('name');
		$brand->description = $request->get('description');	
		$brand->save();

		if (Input::hasFile('image') &&  Input::file('image')->isValid() ) {

			$path = public_path() . '/images/brands/' . $brand->id . '/';

			if( !is_dir( $path ) )
				mkdir( $path );

			$destination_path 	= $path;
			$extension 			= Input::file('image')->getClientOriginalExtension();
			$file_name 			= 'brands_' . $brand->id . '.' . $extension;
			$upload_success 	= Input::file('image')->move($destination_path, $file_name);

			if($upload_success)
				$brand->image = '/images/brands/' . $brand->id . '/' . $file_name;

		}
		$brand->save();

		return redirect()->route('brands');
	}

	public function destroy($id)
	{
		Brands::find($id)->delete();
		return redirect()->route('brands');
	}

	public function edit($id)
	{
		$brands = Brands::find($id);
		return view('brands.edit', compact('brands'));
	}

	public function update(BrandsRequest $request, $id)
	{

		$brand 				= Brands::find($id);
		$brand->name 		= $request->get('name');
		$brand->description = $request->get('description');	

		if (Input::hasFile('image') &&  Input::file('image')->isValid() ) {

			$path = public_path() . '/images/brands/' . $id . '/';

			if( !is_dir( $path ) )
				mkdir( $path );

			$destination_path 	= $path;
			$extension 			= Input::file('image')->getClientOriginalExtension();
			$file_name 			= 'brands_' . $id . '.' . $extension;
			$upload_success 	= Input::file('image')->move($destination_path, $file_name);

			if($upload_success)
				$brand->image = '/images/brands/' . $id . '/' . $file_name;

		}
		$brand->save();
		return redirect()->route('brands');
	}

}
