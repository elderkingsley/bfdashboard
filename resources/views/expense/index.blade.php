@extends('expense.expenselayouttry')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div> 

                <div class="card">
                    <div class="card-header">
                        <h4>Expenses
                            <a href="{{ url('expense/create') }}" class="btn btn-primary float-end">Add Expense</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Expense</th>
                                        <th>Amount</th>
                                        <th>Narration</th>
                                        <th>Beneficiary</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expenses as $expense)
                                        <tr>
                                            <td>{{ $expense->date }}</td>
                                            <td>{{ $expense->expense }}</td>
                                            <td>{{ $expense->amount }}</td>
                                            <td>{{ $expense->narration }}</td>
                                            <td>{{ $expense->beneficiary }}</td>
                                            <td>
                                                <a href="{{ route('expense.edit', $expense->expense_id) }}" class="btn btn-success">Edit</a>
                                                <a href="{{ route('expense.show', $expense->expense_id) }}" class="btn btn-info">View</a>
                                               <form action="{{ route('expense.destroy', $expense->expense_id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                               </form>
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
