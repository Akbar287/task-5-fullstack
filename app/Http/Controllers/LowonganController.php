<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LowonganController extends Controller
{
    public function index()
    {
        $lowongan = $this->merge();
        return view('core/peserta/hasil', compact('lowongan'));
    }

    public function merge()
    {
        $lowongan = Lowongan::where('aktif', 1)->get()->toArray();
        $hasil = Auth::user()->lowongan->toArray();
        $temp = [];
        for ($i = 0; $i < count($lowongan); $i++) {
            $token = 0;
            for ($j = 0; $j < count($hasil); $j++) {
                if ($lowongan[$i]['lowongan_id'] == $hasil[$j]['lowongan_id']) {
                    $token = 1;
                    $temp[] = [
                        "lowongan_id" => $lowongan[$i]['lowongan_id'],
                        "jabatan" => $lowongan[$i]['jabatan'],
                        "detail" => $lowongan[$i]['detail'],
                        "jumlah_penerima" => $lowongan[$i]['jumlah_penerima'],
                        "aktif" => $lowongan[$i]['aktif'],
                        "skor" => $hasil[$j]['skor'],
                        "hasil_seleksi" => $hasil[$j]['hasil_seleksi']
                    ];
                }
            }
            if($token == 0) {
                $temp[] = [
                    "lowongan_id" => $lowongan[$i]['lowongan_id'],
                    "jabatan" => $lowongan[$i]['jabatan'],
                    "detail" => $lowongan[$i]['detail'],
                    "jumlah_penerima" => $lowongan[$i]['jumlah_penerima'],
                    "aktif" => $lowongan[$i]['aktif'],
                    "skor" => 0,
                    "hasil_seleksi" => null
                ];
            }
        }
        return $temp;
    }
}
