<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['list']);
        $this->middleware('auth:api')->only(['store', 'update', 'destroy']);
    }

    public function list()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();

        return view('produk.index', compact('categories', 'subcategories'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category', 'subcategory')->get();

        return response()->json([
            'data' => $products
        ]);
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
        $validator = Validator::make($request->all(), [

            'id_kategori' => 'required',
            'id_subkategori' => 'required',
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg,webp',
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }

        $input = $request->all();

        if ($request->has('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . rand(1, 9) . '.' . $foto->getClientOriginalExtension();
            $foto->move('uploads', $nama_foto);
            $input['foto'] = $nama_foto;
        }

        $Product = Product::create($input);

        return response()->json([
            'success' => true,
            'data' => $Product
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $Product)
    {
        return response()->json([
            'success' => true,
            'data' => $Product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $Product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $Product)
    {
        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required',
            'id_subkategori' => 'required',
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg,webp',

        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }

        $input = $request->all();

        if ($request->has('foto')) {
            File::delete('uploads/' . $Product->foto);
            $foto = $request->file('foto');
            $nama_foto = time() . rand(1, 9) . '.' . $foto->getClientOriginalExtension();
            $foto->move('uploads', $nama_foto);
            $input['foto'] = $nama_foto;
        } else {
            unset($input['foto']);
        }

        $Product->update($input);

        return response()->json([
            'success' => true,
            'message' => 'success',
            'data' => $Product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $Product)
    {
        File::delete('uploads/' . $Product->foto);
        $Product->delete();

        return response()->json([
            'success' => true,
            'message' => 'success'
        ]);
    }

}
