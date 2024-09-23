<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['product', 'user'])->get();

        return view('transactions.index', compact('transactions'));
    }

    public function show(Transaction $transaction)
    {
        $transaction->load(['product', 'user']);
        return view('transactions.show', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'status' => 'required|in:ON_DELIVERY,DELIVERED,CANCELLED'
        ]);

        $transaction->status = $request->status;
        $transaction->save();

        Session::flash('success', 'Status transaksi berhasil diupdate');

        return redirect()->back();
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        Session::flash("success", 'Transaksi berhasil dihapus');
        return redirect()->back();
    }
}
