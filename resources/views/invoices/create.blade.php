@extends('layouts.admin')

@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <div class="container mt-5">
        <h2>Create Invoice</h2>
        <form action="{{ route('invoices.store') }}" method="POST" id="invoice-form">
            @csrf
            <div class="form-group">
                <label for="company_profile_tujuan">Nama Perusahaan Tujuan</label>
                <input type="text" name="company_profile_tujuan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="company_address_tujuan">Alamat Perusahaan Tujuan</label>
                <textarea name="company_address_tujuan" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="company_phone_tujuan">Telepon Perusahaan Tujuan</label>
                <input type="text" name="company_phone_tujuan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="company_email_tujuan">Email Perusahaan Tujuan</label>
                <input type="email" name="company_email_tujuan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="referensi">Referensi</label>
                <input type="text" name="referensi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="invoice_date">Tanggal Invoice</label>
                <input type="date" class="form-control" name="invoice_date" required>
            </div>
            <div class="form-group">
                <label for="due_date">Tanggal Jatuh Tempo</label>
                <input type="date" class="form-control" name="due_date" required>
            </div>

            <table class="table" id="items-table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Nickname Produk</th>
                        <th>Kuantitas</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="items[0][product]" class="form-control" required></td>
                        <td><input type="text" name="items[0][nickname]" class="form-control" required></td>
                        <td><input type="number" name="items[0][quantity]" class="form-control quantity" required></td>
                        <td><input type="text" name="items[0][unit]" class="form-control" required></td>
                        <td><input type="number" name="items[0][price]" class="form-control price" required></td>
                        <td><input type="text" name="items[0][total]" class="form-control total" readonly></td>
                        <td><button type="button" class="btn btn-danger remove-item">Hapus</button </td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" id="add-item">Tambah Item</button>

            <div class="form-group mt-3">
                <label for="subtotal">Subtotal</label>
                <input type="text" name="subtotal" class="form-control" id="subtotal" readonly>
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input type="text" name="total" class="form-control" id="total" readonly>
            </div>
            <button type="submit" class="btn btn-success">Simpan Invoice</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            let itemIndex = 1;

            function calculateTotals() {
                let subtotal = 0;
                $('#items-table tbody tr').each(function() {
                    const quantity = $(this).find('.quantity').val() || 0;
                    const price = $(this).find('.price').val() || 0;
                    const total = quantity * price;
                    $(this).find('.total').val(total);
                    subtotal += total;
                });
                $('#subtotal').val(subtotal);
                $('#total').val(subtotal); // Jika Anda ingin total sama dengan subtotal
            }

            $('#add-item').click(function() {
                const newRow = `
                <tr>
                    <td><input type="text" name="items[${itemIndex}][product]" class="form-control" required></td>
                    <td><input type="text" name="items[${itemIndex}][nickname]" class="form-control" required></td>
                    <td><input type="number" name="items[${itemIndex}][quantity]" class="form-control quantity" required></td>
                    <td><input type="text" name="items[${itemIndex}][unit]" class="form-control" required></td>
                    <td><input type="number" name="items[${itemIndex}][price]" class="form-control price" required></td>
                    <td><input type="text" name="items[${itemIndex}][total]" class="form-control total" readonly></td>
                    <td><button type="button" class="btn btn-danger remove-item">Hapus</button></td>
                </tr>
            `;
                $('#items-table tbody').append(newRow);
                itemIndex++;
            });

            $(document).on('click', '.remove-item', function() {
                $(this).closest('tr').remove();
                calculateTotals();
            });

            $(document).on('change', '.quantity, .price', function() {
                calculateTotals();
            });

            calculateTotals();
        });
    </script>
@endsection
