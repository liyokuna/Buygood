<?php

namespace App\Http\Controllers\users;

use Auth;
use App\Items;
use App\Panier;
use App\Commandes;
use Illuminate\Http\Request;
use Illuminate\Cookie\CookieJar;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    protected $infos=[
        'id_panier'=>'',
        'user_id'=>'',
        'item_id'=>'',
        'quantity'=>'',
    ];
    protected $commande=[
        'id_commande'=>'',
        'id_user'=>'',
        'etat'=>'',
        'prix'=>'',
    ];


    public function setCookie($id){
    return redirect("users/produits")->withCookie(cookie('article-'.$id,$id,1000))
        ->withSuccess("L'article a été ajouté à votre panier ! ");
    }

    public function getCookie(Request $request){
        $cookies = $request->cookie();
        $items=[];
        foreach($cookies as $key => $value) {$items[]=$key;}
        $articles = preg_grep('/\barticle/',$items);
        foreach($articles as $key=>$value){
            $indexs[] = Items::where('id',(trim($value,"\article-")))->firstOrFail();
        }
       if(!empty($indexs)) {
            return view('users.customer.panier', compact('indexs'));
        }else{
            return redirect("users/produits")
                ->withErrors("Votre panier est vide, faites quelque achat ! ");
        }
    }

    public function removeCookie($id){
        $cookies = new CookieJar();
        return redirect("panier")->withCookie($cookies->forget('article-'.$id))
            ->withSuccess("L'article a supprimé de votre panier ! ");
    }


    public function unsetCookies(Array $cookieList)
    {
        if (!empty($cookieList)) {
            foreach ($cookieList as $cookie) {
                $this->headers->setCookie($cookie);
                return $this;
            }
        }
    }

    public function validerPanier(Request $request){

        $ids = $request->input('ids');
        $datas = json_decode($ids,true);
        $articles=[];$quantite=[];$id=[];
        for($i=0; $i<(sizeof($datas['ids'])/2.0); $i++){
            $id[$i]=$datas['ids'][$i];
        }
        for($i=(sizeof($datas['ids'])/2.0); $i<sizeof($datas['ids']); $i++){
            $quantite[]=$datas['ids'][$i];
        }


        $id_panier=uniqid();
        for($i=0;$i<sizeof($quantite);$i++) {
            $infos = new Panier();
            $infos->id_panier = $id_panier;
            $infos->user_id = Auth::user()->id;
            $infos->item_id = htmlentities($id[$i]);
            $infos->quantity = htmlentities($quantite[$i]);
            $infos->save();
        }

        for($i=0;$i<sizeof($quantite);$i++){
            $names[]=Items::select('id','nom','prix')->where('id',$id[$i])->first();
            $panier[]=Panier::select('item_id','quantity')->where('id_panier',$id_panier)->where('id',$id[$i])->first();
        }
        $valeur=0;
        for($i=0;$i<sizeof($quantite);$i++){
            if($names[$i]->id==$id[$i])
                $valeur += $names[$i]->prix*$quantite[$i];
        }

        $commande = new Commandes();
        $commande->id_commande = htmlentities($id_panier);
        $commande->id_user = htmlentities(Auth::user()->id);
        $commande->etat = htmlentities(0);
        $commande->prix = htmlentities($valeur);
        $commande->save();

        /*for($i=0;$i<sizeof($id);$i++){
            $cookies = new CookieJar();
        }*/

        $response = array('status' => 'ok', 'url' => 'users/commandes');
        return response()->json($response);
    }

}
