<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('library/bootstrap/css/bootstrap.min.css')}}">

</head>
<style>
    .table-dark {
        --bs-table-bg: #354554;
    }

    .table-light {
        --bs-table-bg: #F1F1F1;
    }
</style>

<body>
    <div class="container mt-5 bg-white border border-black shadow-lg p-5">
        <div class="row align-items-start p-0">
            <div class="col-7">
                <img src="{{ asset('main/Other/logo.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-5 mt-4">
                <div class="row mb-2">
                    <div class="col-12 text-end fs-4 fw-light" style="color:rgb(55, 99, 136)">Invoice</div>
                </div>
                <div class="row">
                    <div class="col-6 text-end"><strong>Referensi</strong></div>
                    <div class="col-6 text-end">{{ $invoice->referensi }}</div>
                </div>
                <div class="row">
                    <div class="col-6 text-end"><strong>Tanggal</strong></div>
                    <div class="col-6 text-end">{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d/m/Y') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-end"><strong>Tgl. Jatuh Tempo</strong></div>
                    <div class="col-6 text-end">{{ \Carbon\Carbon::parse($invoice->due_date)->format('d/m/Y') }}</div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-5">
                <p class="fw-bold mt-3">Info Perusahaan</p>
                <div class="my-3" style="border-top: 2px solid #354554;"></div>

                <p class="fw-bold mb-2">{{ $invoice->company_name }}</p>

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
                <div class="my-3" style="border-top: 2px solid #354554;"></div>

                @if (!empty($invoice->company_profile_tujuan))
                    <p class="fw-bold mb-2">{{ $invoice->company_profile_tujuan }}</p>
                @else
                    <p class="fw-bold mb-2">-</p>
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
                        $phoneNumber = '+62 ' . ltrim($phoneNumber, '0');
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

            <div class="p-2">
                <table class="table mt-4">
                    <thead class="table-dark text-white">
                        <tr>
                            <th>Produk</th>
                            <th style="width: 80px; text-align: center;">Kuantitas</th>
                            <th style="width: 80px; text-align: center;">Satuan</th>
                            <th style="width: 140px; text-align: end;">Harga</th>
                            <th style="width: 140px; text-align: end;">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="table-light" style="border: 4px solid white;">
                        @if (!empty($items) && is_array($items))
                            @foreach ($items as $item)
                                <tr style="border: 4px solid white;">
                                    <td style="border: 4px solid white;">
                                        <p class="m-0 fw-bold">{{ $item['product'] ?? 'N/A' }}</p>
                                        <p class="m-0">{{ $item['nickname'] ?? 'N/A' }}</p>
                                    </td>
                                    <td
                                        style="width: 80px; text-align: center; vertical-align: middle; border: 4px solid white;">
                                        {{ $item['quantity'] ?? 'N/A' }}
                                    </td>
                                    <td
                                        style="width: 80px; text-align: center; vertical-align: middle; border: 4px solid white;">
                                        {{ $item['unit'] ?? 'N/A' }}
                                    </td>
                                    <td
                                        style="width: 140px; text-align: end; vertical-align: middle; border: 4px solid white;">
                                        {{ number_format($item['price'] ?? 0, 2, '.', ',') }}
                                    </td>
                                    <td
                                        style="width: 140px; text-align: end; vertical-align: middle; border: 4px solid white;">
                                        {{ number_format($item['total'] ?? 0, 2, '.', ',') }}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr style="border: 3px solid white;">
                                <td colspan="5" class="text-center" style="border: 3px solid white;">Tidak ada item
                                    untuk
                                    ditampilkan.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>


            <div class="row ms-2 mt-3">
                <div class="col-6 "></div>
                <div class="col-6 text-body-secondary">
                    <div class="row mb-2">
                        <div class="col-6 text-start fw-semibold">Subtotal</div>
                        <div class="col-6 text-end">Rp {{ number_format($invoice->subtotal ?? 0, 2, '.', ',') }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6 text-start fw-semibold">Total</div>
                        <div class="col-6 text-end">Rp {{ number_format($invoice->total ?? 0, 2, '.', ',') }}</div>
                    </div>
                    <div class="row " style="font-size: 0.98rem;">
                        <div class="col-6 text-start fw-semibold">Sisa Tagihan:</div>
                        <div class="col-6 text-end ">Rp {{ number_format($invoice->total ?? 0, 2, '.', ',') }}</div>
                    </div>
                </div>
            </div>

            <div class="row  mt-5">
                <div class="col-9 "></div>
                <div class="col-3 ">
                    <div class="text center fw-bold">
                        <p style="margin-bottom: 100px;">
                            {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M, Y') }}
                        </p>

                        <p>Amrizal Ivan</p>
                    </div>
                </div>
            </div>

        </div>
</body>

</html>
