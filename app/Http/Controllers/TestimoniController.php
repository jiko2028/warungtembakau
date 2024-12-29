<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TestimoniController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => 'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonis = Testimoni::all();

        return response()->json([
            'data' => $testimonis
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
            'nama_testimoni' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg,webp',

        ]);

        if (!$validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }

        $input = $request->all();

        if ($request->has('foto')) {
            $foto =  $request->file('foto');
            $nama_foto = time() . rand(1, 9) . '.' . $foto->getClientOriginalExtension();
            $foto->move('uploads', $nama_foto);
            $input['foto'] = $nama_foto;
        }

        $Testimoni = Testimoni::create($input);

        return response()->json([
            'data' => $Testimoni
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimoni  $Testimoni
     * @return \Illuminate\Http\Response
     */
    public function show(Testimoni $Testimoni)
    {
        return response()->json([
            'data' => $Testimoni
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimoni  $Testimoni
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimoni $Testimoni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimoni  $Testimoni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimoni $Testimoni)
    {

        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required',
            'deskripsi' => 'required',

        ]);

        if (!$validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }

        $input = $request->all();

        if ($request->has('foto')) {
            File::delete('uploads/' . $Testimoni->foto);

            $foto =  $request->file('foto');
            $nama_foto = time() . rand(1, 9) . '.' . $foto->getClientOriginalExtension();
            $foto->move('uploads', $nama_foto);
            $input['foto'] = $nama_foto;
        } else {
            unset($input['foto']);
        }


        $Testimoni->update($input);
        return response()->json([
            'message' => 'Kategori berhasil diubah!', 
            'data' => $Testimoni,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimoni  $Testimoni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimoni $Testimoni)
    {
        File::delete('uploads/' . $Testimoni->foto);
        $Testimoni->delete();

        return response()->json([
            'message' => 'Kategori berhasil dihapus!',
        ]);
    }
}
