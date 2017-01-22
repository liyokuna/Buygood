<?php
namespace App\Http\Controllers\users;

use Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use Carbon\Carbon;
use App\User;
use APP\authorization;
use Illuminate\Http\Request;


class identiteController extends Controller
{
	protected $infos = [
	'name'=>'',
	'lastname'=>'',
	'email'=>'',
	'street'=>'',
	'extrainfo'=>'',
	'city'=>'',
	'postalcode'=>'',
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
	
	public function update(UsersRequest $request,$id)
	{
		$infos = User::where('id',$id)->firstOrFail();
		foreach (array_keys($this->infos) as $field) {
			$infos->$field= htmlentities($request->__get($field));
		}	
		$infos->save();
			
		return redirect("users/identite")
        ->withSuccess("Les modifications ont été enregistrées !");
	}
	
}