<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenilaianRequest;
use App\Models\Penilaian;
use App\Models\User;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peserta = User::join('penilaian', 'penilaian.user_id', 'users.user_id')->where('level', 'peserta')->get();
        return view("core/hrd/penilaian", compact('peserta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nama = User::select('nama')->addSelect('user_id')->where("level", "peserta")->get();
        return view("core/hrd/penilaian_create", compact('nama'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenilaianRequest $request)
    {
        $penilaian = new Penilaian(); 
        $penilaian->user_id = $request->nama;
        $penilaian->kesehatan = $request->kesehatan;
        $penilaian->pengalaman = $request->pengalaman;
        $penilaian->pendidikan = $request->pendidikan;
        $penilaian->sertifikasi = $request->sertifikasi;
        $penilaian->save();

        return redirect('/input-nilai')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Penilaian Sudah Ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nama = User::select('nama')->addSelect('user_id')->where("level", "peserta")->get();
        $penilaian = Penilaian::where('penilaian_id', $id)->first();
        return view('core/hrd/penilaian_edit', compact('penilaian', 'nama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PenilaianRequest $request, $id)
    {
        $penilaian = Penilaian::find($id);
        $penilaian->kesehatan = $request->kesehatan;
        $penilaian->pengalaman = $request->pengalaman;
        $penilaian->pendidikan = $request->pendidikan;
        $penilaian->sertifikasi = $request->sertifikasi;
        $penilaian->save();

        return redirect('/input-nilai')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Penilaian Sudah Diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penilaian = Penilaian::where('penilaian_id', $id)->first();
        $penilaian->delete();

        return redirect('/input-nilai')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Penilaian Sudah Dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function ranking() 
    {
        $peserta = Penilaian::select('penilaian.penilaian_id')->addSelect('penilaian.user_id')->addSelect('users.nama')->addSelect('penilaian.kesehatan')->addSelect('penilaian.pengalaman')->addSelect('penilaian.pendidikan')->addSelect('penilaian.sertifikasi')->join('users', 'users.user_id', 'penilaian.user_id')->get()->toArray();
        $rank = $this->hitung($this->getValue($peserta));
        for($i=0;$i < count($peserta); $i++) {
            $peserta[$i]['hasil'] = $rank[$i];
        }
        usort($peserta, function($a, $b) {
            return $b['hasil']  <=>  $a['hasil'];
        });
        
        return view('core/hrd/ranking', compact('peserta'));
    }

    public function hitung($peserta) 
    {
        $bobot = [0.055, 0.106, 0.216, 0.623];

        // $peserta = [
        //     [2,2,3,4],
        //     [3,4,1,2],
        //     [1,3,3,4],
        //     [3,3,4,3],
        //     [1,4,2,4]
        // ];

        $peserta_reverse = ($this->transpose($peserta));

        $max = [];
        for ($i = 0; $i < count($peserta_reverse); $i++) {
            $max[$i] = max($peserta_reverse[$i]);
        }

        $normalisasi = [];
        for($i = 0; $i < count($peserta_reverse); $i++) {
            for($j = 0; $j < count($peserta_reverse[$i]); $j++) {
                $normalisasi[$i][$j] = $peserta_reverse[$i][$j] / $max[$i];
            }
        }

        $normalisasi_reverse = ($this->transpose($normalisasi));
        $rank=[];
        for($i = 0; $i < count($normalisasi_reverse); $i++) {
            $temp = 0;
            for($j = 0; $j < count($normalisasi_reverse[$i]); $j++) {
                $temp += $normalisasi_reverse[$i][$j] * $bobot[$j];
            }
            $rank[$i] = round($temp, 3);
        }
        return $rank;

    }
    function transpose($array_one) {
        $array_two = [];
        foreach ($array_one as $key => $item) {
            foreach ($item as $subkey => $subitem) {
                $array_two[$subkey][$key] = $subitem;
            }
        }
        return $array_two;
    }

    public function penilaianData()
    {
        return [
            "user_id" => request("user_id"),
            "kesehatan" => request("kesehatan"),
            "pengalaman" => request("pengalaman"),
            "pendidikan" => request("pendidikan"),
            "sertifikasi" => request("sertifikasi"),
        ];
    }
    public function getValue($arr) {
        $temp = [];
        for($i = 0; $i < count($arr); $i++) {
            $temporary = array_slice($arr[$i], 3);
            $temp[] = array_values($temporary);
        }
        return $temp;
    }
}
