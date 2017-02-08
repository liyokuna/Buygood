<?php

namespace App\Http\Controllers\users;

use Auth;
use App\Commandes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommandesoldController extends Controller
{	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = Commandes::where('etat',1)->simplePaginate(15);
        if(Auth::user()->type=="admin"){
			return view('users.commandes.old.index', compact('commandes'));
		}
		else{
			redirect('users/produits')->withErrors("Il y a eu un problème !");
		}
    }
}
