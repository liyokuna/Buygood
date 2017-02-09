<?php

namespace App\Http\Controllers\users;

use Auth;
use App\User;
use App\Commandes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommandesRequest;


class CommandesController extends Controller
{
	
	protected $infos=[
	'id_commande'=>'',
	'id_user'=>'',
	'etat'=>'',
	'prix'=>'',
	];
	
	protected $values=[
	'etat'=>'',
	];
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Auth::user()->type=="admin"){
			$commandes = Commandes::where('etat','FALSE')->simplePaginate(15);
			return view('users.commandes.index', compact('commandes'));
		}
		else{
			$commandes = Commandes::where('id_user',Auth::user()->id)->simplePaginate(15);
			return view ('users.customer.commandes.index', compact('commandes'));
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return false;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $infos = new Commandes();
		foreach (array_keys($this->infos) as $field) {
			$infos->$field = htmlentities($request->__get($field));
		}
		$infos->save();
	
		return redirect('/users/produits')
        ->withSuccess("Merci d'avoir passé commande chez nous !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id',$id)->select('name','lastname');
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->type=="admin"){
			$infos = Commandes::where('id',$id)->firstOrFail();
			$data = ['id' => $id];

			foreach (array_keys($this->infos) as $field) {
				$data[$field] = old($field, $infos->$field);
			}	
		return view('users.commandes.edit', $data);
		}
		else{
		return redirect("users/produits")
		->withErrors("Quelque chose n'a pas marchée.");
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommandesRequest $request, $id)
    {
		if(Auth::user()->type=="admin"){
			$values = Commandes::where('id',$id)->firstOrFail();
			foreach (array_keys($this->values) as $field) {
			$values->$field= htmlentities($request->__get($field));
		}	
		$values->save();

		return redirect("users/commandes")
			->withSuccess("Les modifications ont été prises en compte !");
		}
		else{
		return redirect("users/produits")
			->withErrors("Quelque chose n'a pas marchée.");
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
