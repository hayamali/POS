<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller {

	public function __construct() {
		//create read update delete
		$this->middleware(['permission:read_users'])->only('index');
		$this->middleware(['permission:create_users'])->only('create');
		$this->middleware(['permission:update_users'])->only('edit');
		$this->middleware(['permission:delete_users'])->only('destroy');

	} //end of constructor

	public function index(Request $request) {
		$users = User::all();
		//$users = User::whereRoleIs('admin')->where(function ($q) use ($request) {

		//return $q->when($request->search, function ($query) use ($request) {

		//	return $query->where('first_name', 'like', '%' . $request->search . '%')
		//->orWhere('last_name', 'like', '%' . $request->search . '%');

		//});

		//})->latest()->paginate(5);
		return view('dashboard.users.index', compact('users'));
	}

	public function create() {
		return view('dashboard.users.create');

	}

	public function store(Request $request) {
		//dd($request->all());
		$data = $this->validate($request, [

			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|unique:users',
			'password' => 'required',
			'permissions' => 'required|min:1',

		]);
		$date = $request->except('permissions');

		$data['password'] = bcrypt($request->password);
		$user = User::create($data);
		$user->attachRole('admin');
		$user->syncPermissions($request->permissions);

		session()->flash('success', trans('site.added_successfully'));
		return redirect()->route('dashboard.users.index');
	}

	public function show(User $user) {

	}

	public function edit(User $user) {
		//$user = User::find($user);
		return view('dashboard.users.edit', compact('user'));
	}

	public function update(Request $request, User $user) {
		$request->validate([
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => ['required', Rule::unique('users')->ignore($user->id)],

			'permissions' => 'required|min:1',
		]);

		$request_data = $request->except(['permissions', 'image']);

		$user->update($request_data);

		$user->syncPermissions($request->permissions);
		session()->flash('success', __('site.updated_successfully'));
		return redirect()->route('dashboard.users.index');
	}

	public function destroy(User $user) {
		$user->delete();
		session()->flash('success', ('site.deleted_successfully'));
		return redirect()->route('dashboard.users.index');
	}
}
