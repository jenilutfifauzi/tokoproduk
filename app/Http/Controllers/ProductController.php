<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\Variants;
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
      
        $categories = Categories::all()->pluck('nama_categories', 'id_categories');
        $variants = Variants::all()->pluck('nama_variants', 'id_variants');

        return view('product.index', compact('categories','variants'));
    }

    public function data()
    {
        $product = DB::table('product')
                        ->leftjoin('product_categories', 'product_categories.id_categories', '=', 'product.id_categories')
                        ->leftjoin('variants', 'variants.id_variants', '=', 'product.id_variants')
                        ->orderBy('id_product','desc')
                        ->get();

        return datatables()
                ->of($product)
                ->addIndexColumn()
                ->addColumn('aksi', function($product){
                    return 
                    '<div class="btn-group">
                        <button onclick="editForm(`'. route('product.update', $product->id_product).'`)" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</button>

                        <button onclick="deleteForm(`'. route('product.destroy',  $product->id_product).'`)"class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</button>
                    </div>';
                })
                ->rawColumns(['aksi'])
                ->make(true);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductRequest  $request
     * @return \Illuminate\Http\Response
     * @param \Illuminate\Http\Request
     */
    public function store(Request $request)
    {
        $product = Product::latest()->first() ?? new Product();
        $request['kode_product'] = 'P-'. tambah_nol_didepan((int)$product->id_product+1, 6);

        $product = Product::create($request->all());

        return response()->json('data berhasil disimpan', 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return response()->json($product,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductRequest  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product =  Product::find($id);
        $product->nama_product = $request->nama_product;
        $product->update();

        return response()->json('data berhasil disimpan', 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product =  Product::find($id);
        $product->delete();

        return response(null, 204);
    }

}
