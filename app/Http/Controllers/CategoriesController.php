<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Http\Requests\StorecategoriesRequest;
use App\Http\Requests\UpdatecategoriesRequest;
use App\Models\Categories as ModelsCategories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index');
    }

    public function data()
    {
        $categories = ModelsCategories::orderby('id_categories', 'asc')->get();

        return datatables()
            ->of($categories)
            ->addIndexColumn()
            ->addColumn('aksi', function ($categories) {
                return
                    '<div class="btn-group">
                        <button onclick="editForm(`' . route('categories.update', $categories->id_categories) . '`)" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</button>

                        <button onclick="deleteForm(`' . route('categories.destroy',  $categories->id_categories) . '`)"class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</button>
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
     * @param  \App\Http\Requests\StorecategoriesRequest  $request
     * @return \Illuminate\Http\Response
     * @param \Illuminate\Http\Request
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_categories' => 'required|unique:product_categories'
        ]);

        $categories = new Categories();
        $categories->nama_categories = $request->nama_categories;
        $categories->save();

        return response()->json('data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = categories::find($id);

        return response()->json($categories, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoriesRequest  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'nama_categories' => 'required|unique:product_categories'
        ]);

        $categories =  Categories::find($id);
        $categories->nama_categories = $request->nama_categories;
        $categories->update();

        return response()->json('data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $categories =  Categories::find($id);
        $categories->delete();

        return response(null, 204);
    }
}
