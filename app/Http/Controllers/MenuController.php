<?php

namespace App\Http\Controllers;

use App\Http\Requests\menuRequest;
use App\Models\menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateModelMenuRequest;
use App\Model\menu as ModelMenu;
// use App\Model\menu as ModelMenu;
use Exception;
use PDOException;

class MenuController extends Controller
{
    public function index()
    {
        try {
            $data = menu::get();
            return Response()->json(['status' => true, 'message' => 'success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'gagal menampilkan data']);
        }
    }
    public function create()
    {
        //
    }
    public function store(StoreMenuRequest $request)
    {
        try {
            $data = menu::create($request->all());
            return response()->json(['status' => true, 'message' => 'input success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal input data']);
        }
    }

    public function show(menu $menu)
    {
        //
    }
    public function edit(menu $menu)
    {
        //
    }

    public function update(StoreMenuRequest $request, menu $menu)
    {
        try {
            $data = $menu->update($request->all());
            return response()->json(['status' => true, 'message' => ' update data sukses', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal update data', 'error_type' => $e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(menu $menu)
    {
        try {
            $data = $menu->delete();
            return Response()->json(['status' => true, 'message' => 'data has been deleted', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'data failed to delete']);
        }
    }
}
