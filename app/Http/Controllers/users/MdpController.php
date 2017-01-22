<?php
namespace App\Http\Controllers\users;

use Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\User;
use App\Http\Requests\MdpUpdateRequest;
use Illuminate\Http\Request;

class MdpController extends Controller
{
	protected $infos = [
	'password'=>'',
	];
	
	public function edit($id)
	{

		$infos = User::where('id',$id)->firstOrFail();
		$data = ['id' => $id];
		
	foreach (array_keys($this->infos) as $field) {
			$data[$field] = old($field, $infos->$field);
    }	

	return view('users.mdp.edit', $data);
	}
	
	
	
	public function update(MdpUpdateRequest $request,$id)
	{
		$infos = User::where('id',$id)->firstOrFail();
		foreach (array_keys($this->infos) as $field) {
			$infos->$field= bcrypt(htmlentities($request->__get($field)));
		}	
		$infos->save();
			
		return redirect("users/identite")
        ->withSuccess("Les modifications ont été enregistrées!");
	}
	
}