<?php

namespace App\Http\Controllers\users;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Items;
use App\ItemsPhotos;
use App\User;
use App\Http\Requests\PhotosRequest;
use App\Http\Requests\PhotoRequest;


class PhotosController extends Controller
{
		protected $infos = [
		    'chemin'=>'',
			'id_items'=>'',
		];
		protected $infosupdate = [
		    'chemin'=>'',
		];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		if(Auth::user()->type=="admin"){
		/*$infos = [];
		foreach ($this->infos as $field => $default) {
			$infos[$field] = old($field, $default);
		}*/
		$items=Items::select('id','nom')->get();
		return view('users.admin.photo.create',compact('items'));
		}else{
		redirect('users/produits')
		->withErrors("Il y aeu un problème !");
		}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotosRequest $request)
    {
    $infos = new ItemsPhotos();
	
    foreach (array_keys($this->infos) as $field) {
      $infos->$field = htmlentities($request->__get($field));
    }
	
    $infos->save();
	
    return redirect('users/produits')
        ->withSuccess("Une nouvelle photo a été ajouté !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	if(Auth::user()->type=="admin"){
		$photos = ItemsPhotos::where('id_items',$id)->get();
		$size = ItemsPhotos::where('id_items',$id)->count();
		$items = Items::where('id',$id)->firstOrFail();
		return view('users.admin.photo.show', compact('items','photos','size'));
	}
	else{
			return redirect("users/produits")
			->withErrors("Quelque chose n'a pas marchée.");
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
			$infos = Items_Photos::select('id_items','chemin')->where('id',$id)->firstOrFail();
			$data = ['id' => $id];
			foreach (array_keys($this->infos) as $field) {
				$data[$field] = old($field, $infos->$field);
			}	
		return view('users.admin.photo.editcustom', $data);
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
    public function update(PhotoRequest $request, $id)
    {
		if(Auth::user()->type=="admin"){
			$infosupdate = Items_Photos::where('id',$id)->firstOrFail();
			$index=$infosupdate->id_items;
			$id_photo = Items::select('id')->where('id',$index)->firstOrFail();
			foreach (array_keys($this->infosupdate) as $field) {
				$infosupdate->$field= htmlentities($request->__get($field));
			}	
			$infosupdate->save();
				
			return redirect("users/photos/$id_photo->id'")
			->withSuccess("Les modifications ont été enregistrées !");
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
			return redirect("users/identite")
			->withErrors("Quelque chose n'a pas marchée.");
		}
		else{
			$infos = ItemsPhotos::where('id',$id)->firstOrFail();	
			$infos->delete();
		
		return redirect("users/produits")
        ->withSuccess("Suppression d'une photo avec succès !");
		}
    }
}
