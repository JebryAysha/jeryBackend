<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    public function index(Request $request ,Commande $commande)
    {
     $commande=$commande->newQuery();
        if ($request->has("user_id")){
        //dd($request->get("user_id"));
            return $commande->where('user_id',$request->get("user_id"))->get() ;
        }
            return  Commande::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $r
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $save = new Commande();
        $save->status =$request->input(["status"]);
        $save->contenue =json_encode($request->input(["contenue"]));
        $save->user_id =$request->input(["user_id"]);
        $save->save();

        Return response()->json($save);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commande  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $categorie= Commande::find($id);

        Return response()->json($categorie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,$id)
    {
        $input=$request->all();
        $product=Commande::find($id);
        $product->update($input);
        $product->save();
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Commande $product)
    {
        $product->delete();
        return response()->json($product);
    }
}
