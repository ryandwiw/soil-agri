<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function store(Request $request)
    {
        $companyName = "Soil Agriculture Indonesia";
        $companyAddress = "Jalan Tegal Mapan No. 18, Kecamatan Pakis, Kab. Malang, Jawa Timur, 65154 Indonesia";
        $companyPhone = "+62 813-3570-7170";
        $companyEmail = "soilagri.ind@gmail.com";

        $invoice = new Invoice();
        $invoice->company_name = $companyName;
        $invoice->company_address = $companyAddress;
        $invoice->company_phone = $companyPhone;
        $invoice->company_email = $companyEmail;
        $invoice->company_profile_tujuan = $request->company_profile_tujuan;
        $invoice->company_address_tujuan = $request->company_address_tujuan;
        $invoice->company_phone_tujuan = $request->company_phone_tujuan;
        $invoice->company_email_tujuan = $request->company_email_tujuan;
        $invoice->referensi = $request->referensi;
        $invoice->invoice_date = $request->invoice_date;
        $invoice->due_date = $request->due_date;
        $invoice->items = json_encode($request->items);
        $invoice->subtotal = $request->subtotal;
        $invoice->total = $request->total;
        $invoice->save();

        return redirect()->route('invoices.show', $invoice->id);
    }

    public function show($id)
    {
        // Mengambil invoice berdasarkan ID
        $invoice = Invoice::findOrFail($id);

        // Mengonversi items dari JSON ke array
        $items = json_decode($invoice->items, true);

        // Mengembalikan view dengan data invoice dan items
        return view('invoices.show', compact('invoice', 'items'));
    }

    public function print($id)
    {
        // Mengambil invoice berdasarkan ID
        $invoice = Invoice::findOrFail($id);

        // Mengonversi items dari JSON ke array
        $items = json_decode($invoice->items, true);

        // Mengembalikan view dengan data invoice dan items
        return view('invoices.pdf', compact('invoice', 'items'));
    }

    // public function print($id)
    // {
    //     // Mengambil invoice berdasarkan ID
    //     $invoice = Invoice::findOrFail($id);
    //     // Mengonversi items dari JSON ke array
    //     $items = json_decode($invoice->items, true);

    //     // Menghasilkan PDF
    //     $pdf = PDF::loadView('invoices.pdf', compact('invoice', 'items'));

    //     // Mengganti karakter yang tidak valid
    //     $filename = 'invoice_' . str_replace(['/', '\\', ' '], ['-', '-', '_'], $invoice->referensi) . '.pdf';

    //     // Menampilkan PDF di browser
    //     return $pdf->stream($filename);
    // }
}
