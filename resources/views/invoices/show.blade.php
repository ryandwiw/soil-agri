@extends('layouts.admin')

@section('content')
    <div class="container mt-5 bg-white p-5">
        <div class="row align-items-center border">
            <div class="col-7">
                <img src="{{ asset('main/Other/logo.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-5 border">
                <div class="row mb-2">
                    <div class="col-12 text-end fs-4 fw-light text-primary"><strong>Invoice</strong></div>
                </div>
                <div class="row ">
                    <div class="col-6 text-end"><strong>Referensi</strong></div>
                    <div class="col-6 text-end">{{ $invoice->referensi }}</div>
                </div>
                <div class="row ">
                    <div class="col-6 text-end"><strong>Tanggal</strong></div>
                    <div class="col-6 text-end">{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d/m/Y') }}</div>
                </div>
                <div class="row ">
                    <div class="col-6 text-end"><strong>Tgl. Jatuh Tempo</strong></div>
                    <div class="col-6 text-end">{{ \Carbon\Carbon::parse($invoice->due_date)->format('d/m/Y') }}</div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-5 ">
                <p class="fw-bold mt-3">Info Perusahaan</p>
                <hr class="my-2">
                <p class="fw-bold">{{ $invoice->company_name }}</p>
                <p class="mb-0">{{ $invoice->company_address }}</p>
                <p class="mb-0"><strong>Telepon:</strong> {{ $invoice->company_phone }}</p>
                <p class="mb-0"><strong>Email:</strong> {{ $invoice->company_email }}</p>
            </div>

            <div class="col-1"></div>

            <div class="col-6 ">
                <p class="fw-bold mt-3">Informasi Tujuan</p>
                <hr class="my-2">
                <p class="fw-bold">{{ $invoice->company_profile_tujuan }}</p>
                <p class="mb-0">{{ $invoice->company_address_tujuan }}</p>
                <p class="mb-0"><strong>Telepon Tujuan:</strong> {{ $invoice->company_phone_tujuan }}</p>
                <p class="mb-0"><strong>Email Tujuan:</strong> {{ $invoice->company_email_tujuan }}</p>
            </div>
        </div>

        <h2>Item</h2>
        <table class="table table-bordered mt-3">
            <thead class="thead-light">
                <tr>
                    <th>Produk</th>
                    <th>Kuantitas</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($items) && is_array($items))
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                {{ $item['product'] ?? 'N/A' }}<br>
                                <small class="text-muted">Nickname: {{ $item['nickname'] ?? 'N/A' }}</small>
                            </td>
                            <td>{{ $item['quantity'] ?? 'N/A' }}</td>
                            <td>{{ $item['unit'] ?? 'N/A' }}</td>
                            <td>Rp {{ number_format($item['price'] ?? 0, 2, ',', '.') }}</td>
                            <td>Rp {{ number_format($item['total'] ?? 0, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada item untuk ditampilkan.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="mt-4">
            <h4>Total</h4>
            <p><strong>Subtotal:</strong> Rp {{ number_format($invoice->subtotal ?? 0, 2, ',', '.') }}</p>
            <p><strong>Total:</strong> Rp {{ number_format($invoice->total ?? 0, 2, ',', '.') }}</p>
        </div>
    </div>
@endsection
