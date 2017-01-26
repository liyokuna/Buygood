<?php
namespace App\Http\Controllers\users;

use Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\User;
use APP\authorization;
use App\Http\Requests\UsersRequest;
use Illuminate\Http\Request;

class identiteController extends Controller
{
	protected $infos = [
	'name'=>'',
	'lastname'=>'',
	'email' => '',
	'street'=>'',
	'extrainfo'=>'',
	'city'=>'',
	'postalcode'=>''
	];
	
	public function index(){
		$id=Auth::user()->id;
		$credentials = User::where('id',$id)->firstOrFail();
		return view('users.user.index', compact('credentials'));
	}
	
	public function edit($id)
	{
	if($id==Auth::user()->id){
		
			$infos = User::where('id',$id)->firstOrFail();
			$data = ['id' => $id];
			
		foreach (array_keys($this->infos) as $field) {
				$data[$field] = old($field, $infos->$field);
		}	

		return view('users.user.edit', $data);
	}
	else{
		return redirect("users/identite")
        ->withErrors("Something went Wrong");
	}
	}
	
	
	
	public function update(UsersRequest $request,$id)
	{
		if($id==Auth::user()->id){
			$infos = User::where('id',$id)->firstOrFail();
			foreach (array_keys($this->infos) as $field) {
				$infos->$field= htmlentities($request->__get($field));
			}	
			$infos->save();
				
			return redirect("users/identite")
			->withSuccess("Changes saved !");
		}
		else{
			return redirect("users/identite")
        ->withErrors("Something went Wrong !");
		}
	}
	
}