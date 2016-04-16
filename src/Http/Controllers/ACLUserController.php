<?php

namespace Zezont4\ACL\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Zezont4\ACL\Http\Requests\ACLUserRequest;
use App\User;

class ACLUserController extends Controller
{

	public $settings = [
		'gender' => [
			1 => 'بنين',
			0 => 'بنات',
		]
	];

	public function __construct()
	{
		//$this->middleware('auth');
		//$this->middleware('acl');
	}

	public function search()
	{
		return View('acl::user.search');
	}

	public function index()

	{
		// DB::row is used to fix order by full_name
		//$users = User::withTrashed()->search()->sort()->select('*', \DB::raw('CONCAT_WS(" ", name1, name2, name3, name4) AS full_name'))->paginate();

		$users = User::withTrashed()->search()->sort()->paginate();

		return View('acl::user.index')->withUsers($users)->withSettings($this->settings);
	}

	public function create()
	{
		return View('acl::user.create')->withSettings($this->settings);
	}

	public function store(ACLUserRequest $request)
	{
		$user = User::create($request->all());

		return redirect()->route('user.show', ['id' => $user->id]);
	}

	public function show($id)
	{
		$user = User::withTrashed()->findOrFail($id);

		return View('acl::user.show')->withUser($user)->withSettings($this->settings);
	}

	public function edit($id)
	{
		$user = User::withTrashed()->findOrFail($id);

		if (auth()->user()->owns($user)) {
			return View('acl::user.edit')->withUser($user)->withSettings($this->settings);
		}

		return response('Unauthorized.', 401);
	}

	public function update($id, ACLUserRequest $request)
	{
		$user = User::withTrashed()->findOrFail($id);

		$user->update($request->all());

		return redirect()->back();
	}


	public function destroy($id)
	{
		$user = User::withTrashed()->findOrFail($id);

		$user->delete();

		return redirect()->back();
	}

	public function restore($id)
	{
		$user = User::withTrashed()->findOrFail($id);

		$user->restore();

		return redirect()->back();
	}
}
