<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Categories;
use App\Http\Requests\CategoriesRequest;

class CategoriesController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$categories = Categories::all();
		return view('categories.index', ['categories' => $categories]);
	}

	public function create()
	{
		return view('categories.create');
	}

	public function store(CategoriesRequest $request)
	{
		$input = $request->all();
		Categories::create($input);

		return redirect()->route('categories');

	}

	public function destroy($id)
	{
		Categories::find($id)->delete();
		return redirect()->route('categories');
	}

	public function edit($id)
	{
		$categories = Categories::find($id);
		return view('categories.edit', compact('categories'));
	}

	public function update(CategoriesRequest $request, $id)
	{
		$categories = Categories::find($id)->update($request->all());
		return redirect()->route('categories');

	}

}
