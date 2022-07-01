<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $data = File::where('user_id', Auth::user()->user_id)->first();
        return view("core/peserta/file", compact('data'));
    }
    public function peserta()
    {
        $data = File::join('users', 'users.user_id', 'file.user_id')->get();
        return view("core/hrd/peserta", compact('data'));
    }
    public function unduh($jenis, $id)
    {
        $file = File::where('file_id', $id)->first()->toArray();
        return Storage::download('public/' . $jenis . '/' . $file[$jenis]);
    }
    public function store(Request $request)
    {
        if($request->hasFile('surat_kesehatan')) {
            $filenameWithExt = $request->file('surat_kesehatan')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('surat_kesehatan')->getClientOriginalExtension();
            $filenameSimpanSk = $filename.'_'.time(). '.'.$extension;
            $request->file('surat_kesehatan')->storeAs('public/surat_kesehatan', $filenameSimpanSk);
        }
        if($request->hasFile('cv')) {
            $filenameWithExt = $request->file('cv')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cv')->getClientOriginalExtension();
            $filenameSimpanCv = $filename.'_'.time(). '.'.$extension;
            $request->file('cv')->storeAs('public/cv', $filenameSimpanCv);
        }
        if($request->hasFile('ijazah')) {
            $filenameWithExt = $request->file('ijazah')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('ijazah')->getClientOriginalExtension();
            $filenameSimpanIjazah = $filename.'_'.time(). '.'.$extension;
            $request->file('ijazah')->storeAs('public/ijazah', $filenameSimpanIjazah);
        }
        if($request->hasFile('ktp')) {
            $filenameWithExt = $request->file('ktp')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('ktp')->getClientOriginalExtension();
            $filenameSimpanKtp = $filename.'_'.time(). '.'.$extension;
            $request->file('ktp')->storeAs('public/ktp', $filenameSimpanKtp);
        }
        if($request->hasFile('skck')) {
            $filenameWithExt = $request->file('skck')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('skck')->getClientOriginalExtension();
            $filenameSimpanSkck = $filename.'_'.time(). '.'.$extension;
            $request->file('skck')->storeAs('public/skck', $filenameSimpanSkck);
        }
        if($request->hasFile('sertifikasi')) {
            $filenameWithExt = $request->file('sertifikasi')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('sertifikasi')->getClientOriginalExtension();
            $filenameSimpanSertifikasi = $filename.'_'.time(). '.'.$extension;
            $request->file('sertifikasi')->storeAs('public/sertifikasi', $filenameSimpanSertifikasi);
        }

        $file = new File();
        $file->user_id = Auth::user()->user_id;
        $file->surat_kesehatan = $filenameSimpanSk ? $filenameSimpanSk : "";
        $file->cv = $filenameSimpanCv ? $filenameSimpanCv : "";
        $file->ktp = $filenameSimpanKtp ? $filenameSimpanKtp : "";
        $file->ijazah = $filenameSimpanIjazah ? $filenameSimpanIjazah : "";
        $file->skck = $filenameSimpanSkck ? $filenameSimpanSkck : "";
        $file->sertifikasi = $filenameSimpanSertifikasi ? $filenameSimpanSertifikasi : "";
        $file->save();
        
        return redirect('/file')->with('status', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data File sudah diupload.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }
}
