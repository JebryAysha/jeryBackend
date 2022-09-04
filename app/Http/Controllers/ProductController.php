<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all()->toArray();
        Return array_reverse($products);


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
     * @param Request $r
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
//        $this->validate($r,[
//            'name'=> 'request',
//            'matric'=> 'request',
//            'phone'=> 'request',
//            'email'=>'request',
//            'password'=> 'request'
//
//        ]);





        $article = new Product([
            'id'   =>$r->input('id'),
            'name' => $r->input('name'),
            'code' => $r->input('code'),
            'type' => $r->input('type'),
            'barcode_symbology' => $r->input('barcode_symbology'),
            'brand_id' => $r->input('brand_id'),
            'category_id' => $r->input('category_id'),
            'unit_id' => $r->input('unit_id'),
            'purchase_unit_id' => $r->input('purchase_unit_id'),
            'sale_unit_id' => $r->input('sale_unit_id'),
            'cost' => $r->input('cost'),
            'marge_detail' => $r->input('marge_detail'),
            'marge_gros' => $r->input('marge_gros'),
            'remise_detail' => $r->input('remise_detail'),
            'prix_min_detail' => $r->input('prix_min_detail'),
            'remise_gros' => $r->input('remise_gros'),
            'prix_min_gros' => $r->input('prix_min_gros'),
            'price' => $r->input('price'),
            'qty' => $r->input('qty'),
            'alert_quantity' => $r->input('alert_quantity'),
            'promotion' => $r->input('promotion'),
            'promotion_price' => $r->input('promotion_price'),
            'starting_date' => $r->input('starting_date'),
            'last_date' => $r->input('last_date'),
            'tax_id' => $r->input('tax_id'),
            'tax_method' => $r->input('tax_method'),
            'image' => $r->input('image'),
            'file' => $r->input('file'),
            'is_variant' => $r->input('is_variant'),
            'featured' => $r->input('featured'),
            'product_list' => $r->input('product_list'),
            'qty_list' => $r->input('qty_list'),
            'price_list' => $r->input('price_list'),
            'product_details' => $r->input('product_details'),
            'is_active' => $r->input('is_active'),
            'is_stockable' => $r->input('is_stockable'),
            'prixgros' => $r->input('prixgros')
        ]);
        $article->save();
        Return response()->json('Article créé !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($idt)
    {
        $article= Products::find($idt);
        Return response()->json($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Products::find($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $article = Products::find($id);
        $article->update($request->all());
        Return response()->json('Article MAJ !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Products::find($id);
        $article->delete();
        return response()->json('Article supprimé !');
    }

}
