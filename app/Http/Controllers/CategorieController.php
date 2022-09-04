<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all()->toArray();
        Return array_reverse($categories);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    Public function store(Request $request)
    {
        $categorie = new Categorie([
            'id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'image' => $request->input('image'),
            'parent_id' => $request->input('parent_id'),
            'is_active' => $request->input('is_active')
            //'slug' => $request->input('slug'),

        ]);
        $categorie->save();
        return response()->json('Catégorie créée !');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    Public function show($id)
    {
        $categorie = Categorie::find($id);
        return response()->json($categorie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categorie = Categorie::find($id);
        $categorie->update($request->all());

        return response()->json('Catégorie MAJ !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    Public function destroy($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        Return response()->json('Catégorie supprimée !');
    }
}
