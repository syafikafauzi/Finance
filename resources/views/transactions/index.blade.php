@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Transaction Index') }}</div>

                <div class="card-body">
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
                        @foreach($transactions as $transaction)
                        <tr>
                            <th scope="row">{{ $transaction->id }}</th>
                            <td>{{ $transaction->name }}</td>
                            <td>RM {{ $transaction->amount }}</td>

                            <td>
                            <a href="{{ route('transactions.show', $transaction) }}"
                                class="btn btn-primary">
                                show
                            </a>
                           
                            <a href="{{ route('transactions.edit', $transaction) }}"
                                class="btn btn-success">
                                edit
                            </a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection