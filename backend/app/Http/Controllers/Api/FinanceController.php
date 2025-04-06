<?php

namespace App\Http\Controllers\Api;

use App\Models\Finance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FinanceController extends Controller
{
    public function index()
    {
        try {
            $finances = Finance::getAllFinances();
            return response()->json($finances);
        } catch (Exception $e) {
            Log::error('Failed to retrieve financial data: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to retrieve financial data', 'error' => config('app.debug') ? $e->getMessage() : 'Something went wrong on the server.'], 500);
        }
    }

    public function show($id)
    {
        try {
            $finance = Finance::findFinance($id);
            return response()->json($finance);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Financial data not found'], 404);
        } catch (Exception $e) {
            Log::error('Failed to retrieve financial data: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to retrieve financial data', 'error' => config('app.debug') ? $e->getMessage() : 'Something went wrong on the server.'], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'date' => 'required|date',
                'description' => 'required|string|max:255',
                'type' => 'required|in:income,expenses',
                'amount' => 'required|numeric|min:0.01',
            ]);

            $finance = Finance::createFinance($request->all());
            return response()->json(['message' => 'Financial data registered successfully', 'data' => $finance], 201);
        } catch (Exception $e) {
            Log::error('Failed to create financial data: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to create financial data', 'error' => config('app.debug') ? $e->getMessage() : 'Something went wrong on the server.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'date' => 'required|date',
                'description' => 'required|string|max:255',
                'type' => 'required|in:income,expenses',
                'amount' => 'required|numeric|min:0.01',
            ]);

            $finance = Finance::findFinance($id);
            $finance->updateFinance($request->all());
            return response()->json(['message' => 'Financial data updated successfully', 'data' => $finance]);
        } catch (Exception $e) {
            Log::error('Failed to update financial data: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to update financial data', 'error' => config('app.debug') ? $e->getMessage() : 'Something went wrong on the server.'], 500);
        }
    }

    public function delete($id)
    {
        try {
            $finance = Finance::findFinance($id);
            $finance->deleteFinance();
            return response()->json(['message' => 'Financial data deleted successfully'], 200);
        } catch (Exception $e) {
            Log::error('Failed to delete financial data: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to delete financial data', 'error' => config('app.debug') ? $e->getMessage() : 'Something went wrong on the server.'], 500);
        }
    }
}