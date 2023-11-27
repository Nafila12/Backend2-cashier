<?php

namespace App\Http\Controllers;

use App\Models\stok;
use App\Http\Requests\StoreStokRequest;
use Exception;
use PDOException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        try {
            $data = Stok::get();
            return Response()->json(['status' => true, 'message' => 'success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'gagal menampilkan data']);
        }
    }

    public function store(StoreStokRequest $request)
    {
        try {
            $data = Stok::create($request->all());
            return response()->json(['status' => true, 'message' => 'input success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal input data']);
        }
    }

    public function show(Stok $stok)
    {
        try {

            return Response()->json(['status' => true, 'data' => $stok]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'data failed to update' . $e]);
        }
    }

    public function update(StoreStokRequest $request, Stok $stok)
    {
        try {
            $data = $stok->update($request->all());
            return response()->json(['status' => true, 'message' => ' update data sukses', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal update data', 'error_type' => $e]);
        }

    }

    public function destroy(stok $stok)
    {
        try {
            $data = $stok->delete();
            return Response()->json(['status' => true, 'message' => 'data has been deleted', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'data failed to delete']);
        }
    }
}
