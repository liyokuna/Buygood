<?php

namespace App\Http\Controllers\users;

use App\Items;
use Illuminate\Http\Request;
use Illuminate\Cookie\CookieJar;
use App\Http\Controllers\Controller;

class CookieController extends Controller
{
    public function setCookie($id){
    return redirect("users/produits")->withCookie(cookie('article-'.$id,$id,1000))
        ->withSuccess("L'article a été ajouté dans votre panier ! ");
    }

    public function getCookie(Request $request){
        $cookies = $request->cookie();
        $items=[];
        foreach($cookies as $key => $value) {$items[]=$key;}
        $articles = preg_grep('/\barticle/',$items);
        foreach($articles as $key=>$value){
            $indexs[] = Items::where('id',(trim($value,"\article-")))->firstOrFail();
        }
        return view('users.customer.panier',compact('indexs'));
    }

    public function removeCookie($id){
        $cookies = new CookieJar();
        return redirect("panier")->withCookie($cookies->forget('article-'.$id))
            ->withSuccess("L'article a supprimé de votre panier ! ");
    }

    public function validerPanier(){

    }

}
