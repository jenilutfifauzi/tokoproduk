<?php

namespace App\Http\Controllers;

use App\Models\Variants;
use Illuminate\Http\Request;


class VariantsController extends Controller
{
   
    public function index()
    {
        return view('variants.index');
    }

    public function data()
    {
        $variants = Variants::orderby('id_variants', 'asc')->get();

        return datatables()
                ->of($variants)
                ->addIndexColumn()
                ->addColumn('aksi', function($variants){
                    return 
                    '<div class="btn-group">
                        <button onclick="editForm(`'. route('variants.update', $variants->id_variants).'`)" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</button>

                        <button onclick="deleteForm(`'. route('variants.destroy',  $variants->id_variants).'`)"class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</button>
                    </div>';
                })
                ->rawColumns(['aksi'])
                ->make(true);
    }

    public function store(Request $request)
    {
        $variants = new Variants();
        $variants->nama_variants = $request->nama_variants;
        $variants->save();

        return response()->json('data berhasil disimpan', 200);

    }

    public function show($id)
    {
        $variants = Variants::find($id);

        return response()->json($variants,200);
    }


    public function update(Request $request, $id)
    {
        $variants =  Variants::find($id);
        $variants->nama_variants = $request->nama_variants;
        $variants->update();

        return response()->json('data berhasil disimpan', 200);

    }

 
    public function destroy(Request $request, $id)
    {
        $variants =  Variants::find($id);
        $variants->delete();

        return response(null, 204);
    }
}
