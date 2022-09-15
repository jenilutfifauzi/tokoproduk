<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductImagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $product = Product::all()->pluck('nama_product', 'id_product');

        return view('product_images.index', compact('product'));
    }

    public function data()
    {
        $product = DB::table('product_images')
            ->leftjoin('product', 'product.id_product', '=', 'product_images.id_product')
            ->orderBy('id_imgs', 'desc')
            ->get();

        return datatables()
            ->of($product)
            ->addIndexColumn()
            ->addColumn('images', function ($product) {
                return '<img src="/images/' . $product->nama_imgs . '" width="50" height="50" />';
            })
            ->addColumn('aksi', function ($product) {
                return
                    '<div class="btn-group">
                        <button onclick="editForm(`' . route('product_images.update', $product->id_imgs) . '`)" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</button>

                        <button onclick="deleteForm(`' . route('product_images.destroy',  $product->id_imgs) . '`)"class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</button>
                    </div>';
            })
            ->rawColumns(['aksi', 'images'])
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
        $request->validate([
            'id_product' => 'required|unique:product_images'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('/images'), $fileName);
        }

        $dataImgs = array(
            'id_product' => $request->id_product,
            'nama_imgs' => $fileName,
        );

        ProductImages::create($dataImgs);

        //product update
        $images = ProductImages::latest()->first() ?? new Product();
        $request['id_img'] = $images->id_product;
        $product =  Product::find($request->id_product);
        $product->foto = 1;
        $product->update();
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
        $product = ProductImages::find($id);

        return response()->json($product, 200);
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
        $request->validate([
            'id_product' => 'required|unique:product_images'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('/images'), $fileName);
        }

        $product =  ProductImages::find($id);
        $product->id_product = $request->id_product;
        $product->nama_imgs = $fileName;
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
        $product =  ProductImages::find($id);
        $product->delete();

        return response(null, 204);
    }
}
