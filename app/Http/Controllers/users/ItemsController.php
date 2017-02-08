<?php

namespace App\Http\Controllers\users;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Items;
use App\User;
use App\ItemsPhotos;
use App\Http\Requests\ItemsRequest;


class ItemsController extends Controller
{
	
		protected $infos = [
		'nom'=>'',
		'prix'=>'',
		'stock'=>'',
		'description'=>'',
		'photo'=>'',
	];
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$products = Items::simplePaginate(15);
        if(Auth::user()->type=="admin"){
			return view('users.admin.index', compact('products'));
		}
		else{
			return view('users.customer.index', compact('products'));
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	
	if(Auth::user()->type=="admin"){
		$infos = [];
		foreach ($this->infos as $field => $default) {
		  $infos[$field] = old($field, $default);
		}
	return view('users.admin.create',$infos);
	}else{
		redirect('users/produits')
		->withErrors("Il y a eu un problème !");
	}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemsRequest $request)
    {
        $infos = new Items();
	
		foreach (array_keys($this->infos) as $field) {
			$infos->$field = htmlentities($request->__get($field));
		}
	
    $infos->save();
	
    return redirect('/users/produits')
        ->withSuccess("Un nouveau produit a été ajouté avec succès !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$infos = Items::where('id',$id)->firstOrFail();
		$photos = ItemsPhotos::where('id_items',$id)->get();
		$data = ['id' => $id];
		foreach (array_keys($this->infos) as $field) {
			$data[$field] = old($field, $infos->$field);
		}	
        if(Auth::user()->type=="admin"){
		return view('users.admin.show', compact('data','photos'));
		}
		else{	
		return view('users.customer.show', compact('data','photos'));
		}
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
			$infos = Items::where('id',$id)->firstOrFail();
			$data = ['id' => $id];

			foreach (array_keys($this->infos) as $field) {
				$data[$field] = old($field, $infos->$field);
			}	
		return view('users.admin.edit', $data);
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
    public function update(ItemsRequest $request, $id)
    {
		if(Auth::user()->type=="admin"){
			$infos = Items::where('id',$id)->firstOrFail();
			foreach (array_keys($this->infos) as $field) {
				$infos->$field= htmlentities($request->__get($field));
			}	
		$infos->save();

		return redirect("users/produits")
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
		if(Auth::user()->type!="admin"){
			return redirect("users/produits")
			->withErrors("Quelque chose n'a pas marchée.");
		}
		else{
			$infos = Items::where('id',$id)->firstOrFail();	
			$infos->delete();
		
		return redirect("users/produits")
        ->withSuccess("Suppression avec succès !");
		}
    }
}
