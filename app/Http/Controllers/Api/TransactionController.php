<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $food_id = $request->input('food_id');
        $status = $request->input('status');

        if ($id) {
            $transaction = Transaction::with(['food', 'user'])->find($id);

            return $transaction
                ? $this->api($transaction, 'Data transaksi berhasil diambil')
                : $this->api(null, 'Data transaksi tidak ada');
        }


        $transaction = Transaction::with(['product', 'user'])->where('user_id', $request->user()->id);

        if ($food_id)
            $transaction->where('food_id', $food_id);

        if ($status)
            $transaction->where('status', $status);

        return $this->api(
            $transaction->paginate($limit),
            'Data list transaksi berhasil diambil'
        );
    }
}
