<?php
namespace App\Http\Controllers\users;

use Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\User;
use APP\authorization;
use App\Http\Requests\UsersUpdateRequest;

class identiteController extends Controller
{
	protected $infos = [
	'name'=>'',
	'lastname'=>'',
	'email'=>'',
	'type'=>'',
	];
	
	public function index(){
		$id=Auth::user()->id;
		$credentials = User::where('id',$id)->firstOrFail();
		return view('users.user.index', compact('credentials'));
	}
	
	public function edit($id)
	{

		$infos = User::where('id',$id)->firstOrFail();
		$data = ['id' => $id];
		
	foreach (array_keys($this->infos) as $field) {
			$data[$field] = old($field, $infos->$field);
    }	

	return view('users.user.edit', $data);
	}
	
	
	
	public function update(UsersUpdateRequest $request,$id)
	{
		$infos = User::where('id',$id)->firstOrFail();
		foreach (array_keys($this->infos) as $field) {
			$infos->$field= htmlentities($request->__get($field));
		}	
		$infos->save();
			
		return redirect("/profile/admin/users")
        ->withSuccess("Changes saved !");
	}
	
}