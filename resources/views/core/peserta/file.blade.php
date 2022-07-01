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
                    <h4>Lamar Pekerjaan</h4>
                </div>
                <div class="card-body">
                    {{Auth::user()->nama}}
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{ url("/file") }}" enctype="multipart/form-data" method="post">@csrf
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Surat Kesehatan</h4>
                </div>
                <div class="card-body">                
                    <div style="width: 100%; height: 100%;" class="d-flex justify-content-center">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('surat_kesehatan') is-invalid @enderror" name="surat_kesehatan" id="surat_kesehatan">
                            <label class="custom-file-label" for="surat_kesehatan">Pilih file</label>
                        </div>
                    </div>
                    @error('surat_kesehatan') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    @if($data->surat_kesehatan) <p>Anda sudah Upload.<a href="{{ url("/file/surat_kesehatan/" . $data->file_id) }}"> Unduh file</a> saya</p> @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Curriculum Vitae</h4>
                </div>
                <div class="card-body">                
                    <div style="width: 100%; height: 100%;" class="d-flex justify-content-center">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('cv') is-invalid @enderror" name="cv" id="cv">
                            <label class="custom-file-label" for="cv">Pilih file</label>
                        </div>
                    </div>
                    @error('cv') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    @if($data->cv) <p>Anda sudah Upload.<a href="{{ url("/file/cv/" . $data->file_id) }}"> Unduh file</a> saya</p> @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Ijazah Terakhir</h4>
                </div>
                <div class="card-body">                
                    <div style="width: 100%; height: 100%;" class="d-flex justify-content-center">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('ijazah') is-invalid @enderror" name="ijazah" id="ijazah">
                            <label class="custom-file-label" for="ijazah">Pilih file</label>
                        </div>
                    </div>
                    @error('surat_kesehatan') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    @if($data->surat_kesehatan) <p>Anda sudah Upload.<a href="{{ url("/file/ijazah/" . $data->file_id) }}"> Unduh file</a> saya</p> @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>KTP</h4>
                </div>
                <div class="card-body">                
                    <div style="width: 100%; height: 100%;" class="d-flex justify-content-center">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('ktp') is-invalid @enderror" name="ktp" id="ktp">
                            <label class="custom-file-label" for="ktp">Pilih file</label>
                        </div>
                    </div>
                    @error('ktp') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    @if($data->ktp) <p>Anda sudah Upload.<a href="{{ url("/file/ktp/" . $data->file_id) }}"> Unduh file</a> saya</p> @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>SKCK</h4>
                </div>
                <div class="card-body">                
                    <div style="width: 100%; height: 100%;" class="d-flex justify-content-center">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('skck') is-invalid @enderror" name="skck" id="skck">
                            <label class="custom-file-label" for="skck">Pilih file</label>
                        </div>
                    </div>
                    @error('skck') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    @if($data->skck) <p>Anda sudah Upload.<a href="{{ url("/file/skck/" . $data->file_id) }}"> Unduh file</a> saya</p> @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Sertifikasi</h4>
                </div>
                <div class="card-body">                
                    <div style="width: 100%; height: 100%;" class="d-flex justify-content-center">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('sertifikasi') is-invalid @enderror" name="sertifikasi" id="sertifikasi">
                            <label class="custom-file-label" for="sertifikasi">Pilih file</label>
                        </div>
                    </div>
                    @error('sertifikasi') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    @if($data->sertifikasi) <p>Anda sudah Upload.<a href="{{ url("/file/sertifikasi/" . $data->file_id) }}"> Unduh file</a> saya</p> @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-wrap">
                    <div class="card-body justify-content-between mx-5 my-10 align-items-center">
                            <b>Notes</b> 
                            <ol>
                                <li>Cantumkan tinggi dan berat badan serta pengalaman pada cv </li>
                                <li>Cantumkan riwayat kesehatan pada surat keterangan sehat</li>
                            </ol>
                            <button class="btn btn-primary btn-rounded-sm btn-lg">Kirim</button>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
