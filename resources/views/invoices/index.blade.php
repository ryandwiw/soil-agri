@extends('layouts.admin')

@section('content')
    <h2>Invoice List</h2>
    <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3">Create New Invoice</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th>Invoice Date</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->company_name }}</td>
                    <td>{{ $invoice->invoice_date }}</td>
                    <td>Rp {{ number_format($invoice->total, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('invoices.generatePDF', $invoice->id) }}" class="btn btn-success">Download PDF</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
