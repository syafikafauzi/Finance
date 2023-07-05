<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index (Request $request)
    {
        //check if keyword exist
        if($request->keyword != null){
        //query using keyword only

        $user = auth()->user();
        $transactions =$user->transactions()
                            ->orWhere('name','LIKE', "%$request->keyword%")
                            ->orWhere('amount' ,'LIKE', "%$request->keyword%")
                            ->paginate();

        $transactions = Transaction::where('name', 'LIKE', "%$request->keyword%")->get();
    }
    else{
        //query current user -> transactions()
        $user = auth()->user();
        $transactions = $user->transactions()->paginate();
        //query all transaction from table...
        //$transactions = Transaction::all();
    }
    

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
        $this->authorize('view',$transaction);

        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        if($transaction->user_id != auth()->user()->id){
            abort(403);
        }
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
