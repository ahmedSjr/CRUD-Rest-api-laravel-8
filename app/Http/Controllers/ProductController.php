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
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required',
        ]);
        return Product::Create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required',
        //     // 'slug' => 'required',
        //     // 'price' => 'required',
        // ]);
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return $product;
        // $product->name = $request->name;
        // $product->slug = $request->slug;
        // $product->price = $request->price;
        // $product->description = $request->description;
        // $product->update();

        // return response()->json('it updated', 200);


        // $article = Product::findOrFail($id);
        // $article->update($request->all());

        // return $article;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $product = Product::findOrFail($id);
        $product->delete();

        return 204;
    }

    // search function

    public function search($name){
        return Product::where('name', 'like', '%'.$name.'%')->get();
    }
}
