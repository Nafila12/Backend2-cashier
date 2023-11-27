<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use Exception;
use PDOException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $data = Category::get();
            return Response()->json(['status' => true, 'message' => 'success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'gagal menampilkan data']);
        }
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            $data = Category::create($request->all());
            return response()->json(['status' => true, 'message' => 'input success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal input data']);
        }
    }

    public function show(Category $category2)
    {
        try {

            return Response()->json(['status' => true, 'data' => $category2]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'data failed to update' . $e]);
        }
    }

    public function update(StoreCategoryRequest $request, Category $category2)
    {
        try {
            $data = $category2->update($request->all());
            return response()->json(['status' => true, 'message' => ' update data sukses', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal update data', 'error_type' => $e]);
        }

    }

    public function destroy(Category $category2)
    {
        try {
            $data = $category2->delete();
            return Response()->json(['status' => true, 'message' => 'data has been deleted', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'data failed to delete']);
        }
    }
}
