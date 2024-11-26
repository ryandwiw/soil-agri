@extends('layouts.admin')

@section('content')
    <div class="container mt-5 bg-white border border-black shadow-lg" style="padding: 60px;">
        <div class="row align-items-center ">
            <div class="col-7">
                <img src="{{ asset('main/Other/logo.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-5 ">
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
            <div class="col-5">
                <p class="fw-bold mt-3">Info Perusahaan</p>
                <div class="my-2" style="border-top: 2px solid #000;"></div>

                <p class="fw-bold">{{ $invoice->company_name }}</p>

                @php
                    $addressParts = explode(' ', trim($invoice->company_address));
                    array_pop($addressParts);
                    $displayAddress = implode(' ', $addressParts);
                @endphp

                <p class="mb-0 text-wrap" style="max-width: 60%;">{{ $displayAddress }}</p>

                @php
                    $companyAddressParts = explode(' ', trim($invoice->company_address));
                    $country = array_pop($companyAddressParts);
                @endphp

                <p class="mb-0">{{ $country }}</p>
                <p class="mb-0">Telp: {{ $invoice->company_phone }}</p>
                <p class="mb-0">Email: {{ $invoice->company_email }}</p>
            </div>

            <div class="col-1"></div>

            <div class="col-6">
                <p class="fw-bold mt-3">Tagihan Untuk</p>
                <div class="my-2" style="border-top: 2px solid #000;"></div>

                @if (!empty($invoice->company_profile_tujuan))
                    <p class="fw-bold">{{ $invoice->company_profile_tujuan }}</p>
                @else
                    <p class="fw-bold">-</p>
                @endif

                @php
                    $addressPartsTujuan = explode(' ', trim($invoice->company_address_tujuan));
                    array_pop($addressPartsTujuan);
                    $displayAddressTujuan = implode(' ', $addressPartsTujuan);
                @endphp

                @if (!empty($displayAddressTujuan))
                    <p class="mb-0 text-wrap" style="max-width: 60%;">{{ $displayAddressTujuan }}</p>
                @else
                    <p class="mb-0 text-wrap" style="max-width: 60%;">-</p>
                @endif

                @php
                    $companyAddressTujuanParts = explode(' ', trim($invoice->company_address_tujuan));
                    $countryTujuan = array_pop($companyAddressTujuanParts);
                @endphp

                @if (!empty($countryTujuan))
                    <p class="mb-0">{{ $countryTujuan }}</p>
                @else
                    <p class="mb-0">-</p>
                @endif

                @php
                    $phoneNumber = $invoice->company_phone_tujuan;

                    if (strpos($phoneNumber, '+62') !== 0) {
                        $phoneNumber = '+62 ' . ltrim($phoneNumber, '0'); // Menghapus angka 0 di depan jika ada
                    }

                    $formattedPhoneNumber = preg_replace(
                        '/(\+62\s?)(\d{3})(\d{4})(\d{4})/',
                        '$1$2-$3-$4',
                        $phoneNumber,
                    );

                    if (empty($phoneNumber) || !preg_match('/^\+62\s?\d{3}-\d{4}-\d{4}$/', $formattedPhoneNumber)) {
                        $formattedPhoneNumber = '-';
                    }
                @endphp

                <p class="mb-0">Telp: {{ $formattedPhoneNumber }}</p>
            </div>

            <table class="table table-bordered mt-5">
                <thead class="table-primary text-white">
                    <tr>
                        <th>Produk</th>
                        <th style="width: 80px;" class="text-center">Kuantitas</th>
                        <th style="width: 80px;" class="text-center">Satuan</th>
                        <th style="width: 140px;" class="text-end">Harga</th>
                        <th style="width: 140px;" class="text-end">Jumlah</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    @if (!empty($items) && is_array($items))
                        @foreach ($items as $item)
                            <tr>
                                <td>
                                    <p class="m-0 fw-bold">
                                        {{ $item['product'] ?? 'N/A' }}
                                    </p>
                                    <p class="m-0">
                                        {{ $item['nickname'] ?? 'N/A' }}
                                    </p>
                                </td>
                                <td style="width: 80px; text-align: center; vertical-align: middle;">{{ $item['quantity'] ?? 'N/A' }}</td>
                                <td style="width: 80px; text-align: center; vertical-align: middle;">{{ $item['unit'] ?? 'N/A' }}</td>
                                <td style="width: 140px; text-align: end; vertical-align: middle;">
                                    {{ number_format($item['price'] ?? 0, 2, ',', '.') }}</td>
                                <td style="width: 140px; text-align: end; vertical-align: middle;">
                                    {{ number_format($item['total'] ?? 0, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada item untuk ditampilkan.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <div class="row">
                <div class="col-6"></div>
                <div class="col-6">
                    <div class="mt-4">
                        <p><strong>Subtotal:</strong> Rp {{ number_format($invoice->subtotal ?? 0, 2, ',', '.') }}</p>
                        <p><strong>Total:</strong> Rp {{ number_format($invoice->total ?? 0, 2, ',', '.') }}</p>
                        <p><strong>Sisa Tagihan:</strong> Rp {{ number_format($invoice->total ?? 0, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>

        </div>
    @endsection
