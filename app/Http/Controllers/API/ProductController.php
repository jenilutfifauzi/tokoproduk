<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        
        if (!empty($product)) {
            return response([
                'success' => true,
                'message' => 'Success',
                'data' => $product
            ], 200);
        } else {
            return response([
                'success' => false,
                'message' => 'Failed',
            ], 400);
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('product')
            ->leftjoin('product_images', 'product.id_product', '=', 'product_images.id_product')
            ->leftjoin('product_categories', 'product_categories.id_categories', '=', 'product.id_categories')
            ->leftjoin('variants', 'variants.id_variants', '=', 'product.id_variants')
            ->orderBy('id_imgs', 'desc')
            ->where('product.id_product', $id)
            ->get()->toArray();

        if (!empty($product)) {
            return response([
                'success' => true,
                'message' => 'Success',
                'data' => $product
            ], 200);
        } else {
            return response([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
