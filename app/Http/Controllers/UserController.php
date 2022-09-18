<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $categorie = User::all()->toArray();
        Return array_reverse($categorie);


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $categorie= User::find($id);

        Return response()->json($categorie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,$id)
    {
        $input=$request->all();
        $product=Product::find($id);
        $product->update($input);
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $product)
    {
        $product->delete();
        return response()->json($product);
    }
}
