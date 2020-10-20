<?php

namespace App\Http\Controllers;

/* Import model */
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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
}
