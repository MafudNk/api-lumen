<?php

namespace App\Http\Controllers;

/* Import model */
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        
        return response()->json($product);
    }

    public function show($id){
        $product = Product::find($id);
        
        return response()->json($product);
    }

    public function create(Request $request)
    {
        /* validasi data */
        $this->validate($request, [
            'nama' => 'required|string',
            'harga' => 'required|integer',
            'warna' => 'required|string',
            'kondisi' => 'required|in:baru,lama',
            'deskripsi' => 'string'
        ]);
        /* Ambil data */
        $data = $request->all();
        /* Post data */
        $product = Product::create($data);

        return response()->json($product);
    }
    public function update(Request $request, $id)
    {
        /* get data from model find by id */
        $product = Product::find($id);

        /* jika product yang mau di ambil tidak ada beri pesan */
        if (!$product) {
            return response()->json(["message" => "yang mau di update datanya tidak ditemukan :( "], 404);
        }

        /* Ambil data tapi di validasi dulu*/
        $this->validate($request, [
            'nama' => 'string',
            'harga' => 'integer',
            'warna' => 'string',
            'kondisi' => 'in:baru,lama',
            'deskripsi' => 'string'
        ]);
        $data = $request->all();
        /* update data from $data */
        $product->fill($data);
        /* save  */
        $product->save();
        /* Post data */
        // $product = Product::updated($data);

        return response()->json($product);
    }
    
    public function destroy($id){
         /* get data from model find by id */
         $product = Product::find($id);

         /* jika product yang mau di hapus tidak ada beri pesan */
         if (!$product) {
             return response()->json(["message" => "yang mau di dihapus datanya tidak ditemukan :( "], 404);
         }
         /* delete items */
         $product->delete();

         return response()->json(["message" => "items product sudah terhapus"]);
    }
}
