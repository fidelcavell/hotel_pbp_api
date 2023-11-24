<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $customer = customer::all();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil ambil data',
                'data' => $customer,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => [],
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $customer = customer::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Berhasil insert data',
                'data' => $customer,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => [],
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $customer = customer::find($id);
            if (!$customer) {
                throw new \Exception('User tidak ditemukan');
            }

            return response()->json([
                'status' => true,
                'message' => 'Berhasil ambil data',
                'data' => $customer,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => [],
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $customer = customer::find($id);
            if (!$customer) {
                throw new \Exception('User tidak ditemukan');
            }

            $customer->update(request()->all());
            return response()->json([
                'status' => true,
                'message' => 'Berhasil update data',
                'data' => $customer,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => [],
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $customer = customer::find($id);
            if (!$customer) {
                throw new \Exception('User tidak ditemukan');
            }

            $customer->delete();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil delete data',
                'data' => $customer,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => [],
            ], 400);
        }
    }
}
