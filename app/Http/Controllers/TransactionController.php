<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index ()
    {
        // query all transaction from tables 'transactions' using Transaction.php model
        $transactions = Transaction::all();

        //return view with transactions data
        return view('transactions.index', compact('transactions'));
    }

    public function create ()
    {
    //return view resources/views/transactions/
    return view('transactions.create');
    }

    public function store (Request $request)
    {

        $transaction = new Transaction();
        $transaction->name = $request->name;
        $transaction->amount = $request->amount;
        $transaction->user_id = auth()->user()->id;
        $transaction->save();

        //return redirect to transactions index page
        return redirect()->to('/transactions');
    
    }
    
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Transaction $transaction, Request $request)
    {
        //POPO Plain Old PHP Object
        $transaction->name = $request->name;
        $transaction->amount = $request->amount;
        $transaction->save();

        return redirect()->route('transactions.index');
    }

    public function delete(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index');
    }
}
