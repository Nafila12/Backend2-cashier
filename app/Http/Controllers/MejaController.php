<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMejaRequest;
use App\Models\Meja;
use Exception;
use PDOException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function index()
    {
        try {
            $data = Meja::get();
            return Response()->json(['status' => true, 'message' => 'success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'gagal menampilkan data']);
        }
    }

    public function store(StoreMejaRequest $request)
    {
        try {
            $data = Meja::create($request->all());
            return response()->json(['status' => true, 'message' => 'input success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal input data']);
        }
    }

    public function show(Meja $meja)
    {
        try {

            return Response()->json(['status' => true, 'data' => $meja]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'data failed to update' . $e]);
        }
    }

    public function update(StoreMejaRequest $request, Meja $meja)
    {
        try {
            $data = $meja->update($request->all());
            return response()->json(['status' => true, 'message' => ' update data sukses', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal update data', 'error_type' => $e]);
        }

    }

    public function destroy(Meja $meja)
    {
        try {
            $data = $meja->delete();
            return Response()->json(['status' => true, 'message' => 'data has been deleted', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'data failed to delete']);
        }
    }
}
