<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categorie = Categorie::all()->toArray();
        Return array_reverse($categorie);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $r
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $path = $request->file('file')->store('public/files');
        $url=explode("/",$path);
        $real_path="storage/$url[1]/$url[2]";

        $save = new Categorie();
        $save->name =$request->input(["name"]);
        $save->image =$real_path;
        $save->is_active = $request->get('is_active');
        $save->save();

        Return response()->json($save);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $categorie= Categorie::find($id);

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
        $product=Categorie::find($id);
        $product->update($input);
        $product->save();
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Categorie $product)
    {
        $product->delete();
        return response()->json($product);
    }
}
