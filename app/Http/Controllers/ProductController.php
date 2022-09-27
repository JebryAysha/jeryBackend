<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index(Request $request ,Product $products)
    {
        $products=$products->newQuery();
        if ($request->has("name")){
        return $products->where('name',$request->get("name"))->get();
    }
    else if ($request->has("categorie_id")){
        return $products->where('categorie_id',$request->get("categorie_id"))->get() ;
    }
        return  Product::all();


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $r
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $path = $request->file('file')->store('public/files');
        $url=explode("/",$path);
        $real_path="storage/$url[1]/$url[2]";
        $save = new Product();
        $save->image =$real_path;
        $save->name =$request->input(["name"]);
        $save->qty = (int)$request->get('qty');
        $save->price =$request->get('price');
        $save->categorie_id = (int)$request->get('categorie_id');
        $save->save();

        Return response()->json($save);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $article= Product::find($id);

        Return response()->json($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,Product $product)
    {
        $input=$request->all();
        $product->update($input);
        $product->save();
            return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product): \Illuminate\Http\JsonResponse
    {
        $product->delete();
        return response()->json(200);
    }

}
