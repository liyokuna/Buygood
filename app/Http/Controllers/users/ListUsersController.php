<?php
namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;


class ListUsersController extends Controller
{
	protected $infos=[
	'type'=>'',
	];
	public function index(){
		
		$users = User::simplePaginate(15);
		return view('users.users.index', compact('users'));
	}
	
	public function edit($id)
	{

		$infos = User::where('id',$id)->firstOrFail();
		$data = ['id' => $id];
		
	foreach (array_keys($this->infos) as $field) {
			$data[$field] = old($field, $infos->$field);
    }	

	return view('users.users.edit', $data);
	}
	
	public function update($id)
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