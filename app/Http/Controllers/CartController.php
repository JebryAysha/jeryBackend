<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id , Request $request){
        $produit = Product::find($id);
        $produit->carts()->attach(auth()->user()->carts->id ,['quantite' => $request->quantite]);
        return response()->json($produit);
    }

    public  function deletefromcart($id){
        $produit = Product::find($id);
        $produit->carts()->detach(auth()->user()->cart->id);
        Return response()->json('produit supprimée !');
    }

}
