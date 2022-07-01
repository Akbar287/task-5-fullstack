@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Selamat Datang</h4>
                </div>
                <div class="card-body">
                    {{Auth::user()->nama}}
                </div>
            </div>
        </div>
    </div>
</div>

@if(Auth::user()->level === "peserta")
<div class="row">
    <div class="col-12 col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Lamar Pekerjaan</h4>
            </div>
            <div class="card-body">                
                <div style="width: 100%; height: 100%;">
                    <p>Lamar pekerjaan menjadi petugas keamanan kami.</p>
                    <a href={{ url('/file') }} class="btn btn-primary btn-lg">Lamar Pekerjaan</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Hasil Seleksi</h4>
            </div>
            <div class="card-body">
                <div style="width: 100%; height: 100%;">
                    <p>Cek hasil penerimaan pegawai baru disini.</p>
                    <a href={{ url('/hasil') }} class="btn btn-primary btn-lg">Cek Hasil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(Auth::user()->level === "hrd")
<div class="row">
    <div class="col-12 col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Pelamar</h4>
            </div>
            <div class="card-body">                
                <div style="width: 100%; height: 100%;">
                    <p>Menyediakan daftar peserta pelamar.</p>
                    <a href={{ url('/peserta') }} class="btn btn-primary btn-lg">Daftar pelamar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Penilaian</h4>
            </div>
            <div class="card-body">
                <div style="width: 100%; height: 100%;">
                    <p>Input penilaian yang diberikan kepada calon pelamar dan seleksi hasilnya.</p>
                    <a href={{ url('/input-nilai') }} class="btn btn-primary btn-lg">Penilaian</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Perankingan</h4>
            </div>
            <div class="card-body">
                <div style="width: 100%; height: 100%;">
                    <p>Lihat Hasil Rangking.</p>
                    <a href={{ url('/ranking') }} class="btn btn-primary btn-lg">Perankingan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(Auth::user()->level === "Admin")
<div class="row">
    <div class="col-12 col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Manajemen User</h4>
            </div>
            <div class="card-body">                
                <div style="width: 100%; height: 100%;">
                    <p>Atur user.</p>
                    <a href={{ url('/user') }} class="btn btn-primary btn-lg">Manajemen</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
