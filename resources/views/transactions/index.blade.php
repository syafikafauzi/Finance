@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

    

        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">{{ __('Transaction Index') }}</div>

                <div class="col-md-12">
                    
                <div class="card-body">
                    Total Transaction: {{ $transactions->count()}}
                    <br>
                    Total Amount Transactions: RM {{ $transactions->sum('amount')}}
                    <br>
                    Average Amount Transaction: RM {{number_format($transactions->avg('amount'),2)}}
                    <br>
                    Maximum Amount Transaction: RM{{ $transactions->max('amount')}}
                    <br>
                    Minimum Amount Transaction: RM{{ $transactions->min('amount')}}
                </div>

            <form method="GET" action="">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" value="{{ request()->get('keyword')}}"/>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
            <br>

                <a href="{{ route('transactions.create') }}"
                                class="btn btn-success">
                                create
                            </a>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $key => $transaction)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $transaction->name }}</td>
                            <td>RM {{ $transaction->amount }}</td>
                            <td> {{ $transaction->user->name }}</td>

                            <td>
                            <a href="{{ route('transactions.show', $transaction) }}"
                                class="btn btn-primary">
                                show
                            </a>
                           
                            <a href="{{ route('transactions.edit', $transaction) }}"
                                class="btn btn-success">
                                edit
                            </a>

                            <a href="{{ route('transactions.delete', $transaction) }}"
                                class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">
                                delete
                            </a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection