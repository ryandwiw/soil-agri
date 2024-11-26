<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        h1, h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Invoice</h1>

    <h2>Informasi Perusahaan</h2>
    <p><strong>Nama Perusahaan:</strong> {{ $invoice->company_name }}</p>
    <p><strong>Alamat:</strong> {{ $invoice->company_address }}</p>
    <p><strong>Telepon:</strong> {{ $invoice->company_phone }}</p>
    <p><strong>Email:</strong> {{ $invoice->company_email }}</p>

    <h2>Informasi Tujuan</h2>
    <p><strong>Nama Perusahaan Tujuan:</strong> {{ $invoice->company_profile_tujuan }}</p>
    <p><strong>Alamat Tujuan:</strong> {{ $invoice->company_address_tujuan }}</p>
    <p><strong>Telepon Tujuan:</strong> {{ $invoice->company_phone_tujuan }}</p>
    <p><strong>Email Tujuan:</strong> {{ $invoice->company_email_tujuan }}</p>

    <h2>Detail Invoice</h2>
    <p><strong>Referensi:</strong> {{ $invoice->referensi }}</p>
    <p><strong>Tanggal Invoice:</strong> {{ $invoice->invoice_date }}</p>
    <p><strong>Tanggal Jatuh Tempo:</strong> {{ $invoice->due_date }}</p>

    <h2>Item</h2>
    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Nickname</th>
                <th>Kuantitas</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item['product'] }}</td>
                <td>{{ $item['nickname'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ $item['unit'] }}</td>
                <td>Rp {{ number_format($item['price'], 2, ',', '.') }}</td>
                <td>Rp {{ number_format($item['total'], 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Total</h2 <p><strong>Subtotal:</strong> Rp {{ number_format($invoice->subtotal, 2, ',', '.') }}</p>
    <p><strong>Total:</strong> Rp {{ number_format($invoice->total, 2, ',', '.') }}</p>
</body>
</html>
