<?php

namespace App\Http\Controllers;

use App\Http\Requests\JenisRequest;
use App\Models\Jenis;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdatejenisRequest;
use Exception;
use PDOException;

class JenisController extends Controller
{
    public function index()
    {
        try {
            $data = jenis::get();
            return Response()->json(['status' => true, 'message' => 'success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'gagal menampilkan data']);
        }
    }

    public function store(StorejenisRequest $request)
    {
        try {
            $data = Jenis::create($request->all());
            return response()->json(['status' => true, 'message' => 'input success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal input data']);
        }
    }

    public function show(jenis $jenis)
    {
        //
    }

    public function edit(jenis $jenis)
    {
        //
    }

    
    public function update(StorejenisRequest $request, Jenis $jeni)
    {
        try {
            $data = $jeni->update($request->all());
            return response()->json(['status' => true, 'message' => ' update data sukses', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal update data', 'error_type' => $e]);
        }
    }

    
    public function destroy(Jenis $jeni)
    {
        try {
            $data = $jeni->delete();
            return Response()->json(['status' => true, 'message' => 'data has been deleted', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'data failed to delete']);
        }
    }
}
