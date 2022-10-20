<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Product;
use App\Models\User;
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
        $data=[];
        $all=Commande::all();
        foreach ($all as $order){
            $id=$order['user_id'];
            $user=User::find($id);
            $ct=json_decode($order['contenue']);
            $c=substr($ct,1);
            $c=rtrim($c,"]");
            $c=explode(",",$c);
            $d=[];
            foreach ($c as $value){
                $d[]= Product::find(intval($value));
            }
            $count=count($d);
            $data[]=[
                'id'=>$order['id'],
                'status'=>$order['status'],
                'contenue'=>"$count",
                'user_id'=>$user['name'],
                'created_at'=>$order['created_at'],
                'updated_at'=>$order['updated_at'],
            ];
        }
            return  $data;
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
     * @return false|string
     */
    public function show($id)
    {
        $comande= Commande::find($id);
        $ct=json_decode($comande['contenue']);
        $c=substr($ct,1);
        $c=rtrim($c,"]");
        $c=explode(",",$c);
        $d=[];
        foreach ($c as $value){
            $d[]= Product::find(intval($value));
        }

        Return $d;
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
