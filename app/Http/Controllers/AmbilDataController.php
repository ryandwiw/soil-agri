<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
// use GuzzleHttp\Client;
use Sunra\PhpSimple\HtmlDomParser;
use Goutte\Client;

class AmbilDataController extends Controller
{
    // public function ambilData()
    // {
    //     $url = 'https://siskaperbapo.jatimprov.go.id/';
    //     $client = new Client();

    //     $kataKunci = 'Beras';

    //     try {
    //         $crawler = $client->request('GET', $url);
            
    //         // Ambil judul halaman
    //         $title = $crawler->filter('title')->text();

    //         // Ambil data dari elemen dengan ID "harga"
    //         $hargaData = [];
    //         $crawler->filter('#harga table tr')->each(function ($row, $index) use (&$hargaData , $kataKunci) {
    //             // Skip baris header
    //             if ($index === 0) {
    //                 return;
    //             }

    //             $col1 = $row->filter('td')->eq(0)->text();
    //             $col2 = $row->filter('td')->eq(1)->text();
    //             $col3 = $row->filter('td')->eq(2)->text();
    //             $col4 = $row->filter('td')->eq(3)->text();

    //             $hargaData[] = [
    //                 'no' => $col1,
    //                 'nama_bahan_pokok' => $col2,
    //                 'satuan' => $col3,
    //                 'harga' => $col4,
    //             ];
    //         });

    //         // Kirim data ke view
    //         return $hargaData;
    //     } catch (\Exception $e) {
    //         return [
    //             'pageTitle' => 'Gagal mengambil judul. Pesan Kesalahan: ' . $e->getMessage(),
    //             'hargaData' => [],
    //         ];
    //         // Tangani kesalahan jika terjadi
    //     }
    // }

    public function ambilData()
{
    $url = 'https://siskaperbapo.jatimprov.go.id/';
    $client = new Client();

    $kataKunci = ['Beras', 'Gula','Jagung','Kacang','Cabe','Bawang','kubis','Kentang','Tomat','Wortel','Buncis']; // Ganti dengan kata kunci yang diinginkan

    try {
        $crawler = $client->request('GET', $url);
        
        $hargaData = collect([]);
        $crawler->filter('#harga table tr')->each(function ($row, $index) use ($hargaData, $kataKunci) {
            // Skip baris header
            if ($index === 0) {
                return;
            }

            $col2 = $row->filter('td')->eq(1)->text();
            $col2 = str_replace('/ kg', '', $col2);

            // Periksa apakah setidaknya satu kata kunci ada dalam nama bahan pokok
            if ($this->containsAny($col2, $kataKunci)) {
                $col1 = $row->filter('td')->eq(0)->text();
                $col3 = $row->filter('td')->eq(2)->text();
                $col4 = $row->filter('td')->eq(3)->text();

                

                $hargaData->push([
                    'no' => $col1,
                    'nama_bahan_pokok' => $col2,
                    'satuan' => $col3,
                    'harga' => $col4,
                ]);
            }
        });
        // Kirim data ke view
        return $hargaData;
    } catch (\Exception $e) {
        return view('components.ambildata', [
            'pageTitle' => 'Gagal mengambil judul. Pesan Kesalahan: ' . $e->getMessage(),
            'hargaData' => [],
        ]);
        // Tangani kesalahan jika terjadi
    }
}

/**
 * Periksa apakah setidaknya satu kata kunci ada dalam teks.
 *
 * @param string $text
 * @param array $keywords
 * @return bool
 */
private function containsAny($text, array $keywords)
{
    foreach ($keywords as $keyword) {
        if (stripos($text, $keyword) !== false) {
            return true;
        }
    }
    return false;
}
}
