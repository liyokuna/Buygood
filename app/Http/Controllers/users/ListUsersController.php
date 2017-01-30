<?php
namespace App\Http\Controllers\users;

use Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;


class ListUsersController extends Controller
{
	protected $infos=[
	'name'=>'',
	'lastname'=>'',
	'type'=>'',
	];
	protected $infosUpdate=[
	'type'=>'',
	];
	public function index(){
		if(Auth::user()->type=="admin"){
			$users = User::simplePaginate(15);
			return view('users.users.index', compact('users'));
		}
		else{
			redirect('users/identite')
			->withErrors("Les modifications ont été enregistrées !");
		}
	}
	
	public function edit($id)
	{
		if(Auth::user()->type=="admin"){
			$infos = User::where('id',$id)->firstOrFail();
			$data = ['id' => $id];
			
		foreach (array_keys($this->infos) as $field) {
				$data[$field] = old($field, $infos->$field);
		}	

		return view('users.users.edit', $data);
		}
		else{
			redirect('users/identite')
			->withErrors("Les modifications ont été enregistrées !");
		}
	}
	
	public function update(TypeRequest $request, $id)
	{
		$infosUpdate = User::where('id',$id)->firstOrFail();
		foreach (array_keys($this->infosUpdate) as $field) {
			$infosUpdate->$field= htmlentities($request->__get($field));
		}	
		$infosUpdate->save();
			
		return redirect("users/userslist")
        ->withSuccess("Les modifications ont été enregistrées !");
	}
	
	
	
}