<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinasi = Destination::all();
        return response()->json([
            'status' => true,
            'message' => 'Data Berhasil Ditemukan',
            'data' => $destinasi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_destinasi' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'htm' => 'required',
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Data Gagal Ditambahkan',
                'errors' => $validator->errors()
            ], 422);
        }

        $destinasi = Destination::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data Berhasil Ditambahkan',
            'data' => $destinasi
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $destinasi = Destination::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Data Berhasil Ditemukan',
            'data' => $destinasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_destinasi' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'htm' => 'required',
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Data Gagal Diubah',
                'errors' => $validator->errors()
            ], 422);
        }
        $destinasi = Destination::findOrFail($id);
        $destinasi->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data Berhasil Diubah',
            'data' => $destinasi
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destinasi = Destination::findOrFail($id);
        $destinasi->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data Berhasil Dihapus',
        ], 204);
    }
}
