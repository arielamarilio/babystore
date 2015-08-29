<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\User;

use Auth;

use App\Http\Requests\UsersRequest;

use Input;
use Validator;
use Redirect;
use Request;
use Session;

class UsersController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$products = Products::all();
		return view('products.index', ['products' => $products]);
	}

	public function destroy($id)
	{
		Products::find($id)->delete();
		return redirect()->route('products');
	}

	public function edit()
	{
		$user = Auth::user();
		return view('users.edit', compact('user'));
	}

	public function internal_update(UsersRequest $request)
	{

		$oAuth = Auth::user();

		$user = User::find($oAuth->id);
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->phone = $request->get('phone');

		if(!empty($request->get('password'))) {
			$user->password = bcrypt($request->get('password'));
		}
		$user->save();

		return redirect()->route('home');
	}

}
