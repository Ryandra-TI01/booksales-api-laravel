<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionResource;
use App\Models\Book;
use App\Models\Transaction;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    use ApiResponse;

    /**
     * Display all transactions.
     */
    public function index()
    {
        $transactions = Transaction::with('customer')->get();

        if ($transactions->isEmpty()) {
            return $this->errorResponse('No transactions found', null, 404);
        }

        return $this->successResponse(
            TransactionResource::collection($transactions),
            'Transactions retrieved successfully'
        );
    }

    /**
     * Store a newly created transaction.
     */
    public function store(Request $request)
    {
        // 1. validator & cek validator
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // 2. generate orderNumber -> unique | ORD-023948302
        $uniqueCode = "ORD-" . strtoupper(uniqid());

        // 3. ambil user yang sedang login & cek login (apakah ada data user?)
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized!'
            ], 401);
        }

        // 4. mencari data buku dari request
        $book = Book::find($request->book_id);

        // 5. cek stok buku
        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Stok barang tidak cukup!'
            ], 400);
        }

        // 6. hitung total harga = price * quantity
        $totalAmount = $book->price * $request->quantity;

        // 7. kurangi stok buku (update)
        $book->stock -= $request->quantity;
        $book->save();

        // 8. simpan data transaksi
        $transactions = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'total_amount' => $totalAmount
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction created successfully!',
            'data' => $transactions
        ], 201);
    }

    /**
     * Display a specific transaction.
     */
    public function show($id)
    {
        $transaction = Transaction::with('customer')->find($id);

        if (!$transaction) {
            return $this->errorResponse('Transaction not found', null, 404);
        }

        return $this->successResponse(
            new TransactionResource($transaction),
            'Transaction retrieved successfully'
        );
    }

    /**
     * Update an existing transaction.
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return $this->errorResponse('Transaction not found', null, 404);
        }

        $validated = $request->validate([
            'order_number' => 'sometimes|required|string|max:255|unique:transactions,order_number,' . $transaction->id . ',id',
            'customer_id' => 'sometimes|required|integer|exists:users,id',
            'total_amount' => 'sometimes|required|numeric|min:0',
        ]);

        $transaction->update($validated);

        return $this->successResponse(
            new TransactionResource($transaction),
            'Transaction updated successfully'
        );
    }

    /**
     * Delete a transaction.
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return $this->errorResponse('Transaction not found', null, 404);
        }

        $transaction->delete();

        return $this->successResponse(null, 'Transaction deleted successfully', 200);
    }
}
