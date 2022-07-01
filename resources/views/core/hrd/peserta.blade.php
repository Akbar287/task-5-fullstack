@extends('layouts.app')

@section('content')
<div class="row">
    @if(session('status')) {!! session('status') !!} @endif
    <div class="col-12 col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Pelamar</h4>
            </div>
            <div class="card-body">                
                <div style="width: 100%; height: 100%;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Nama</td>
                                <td>Surat Kesehatan</td>
                                <td>CV</td>
                                <td>Ijazah</td>
                                <td>KTP</td>
                                <td>SKCK</td>
                                <td>Sertifikasi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nama }}</td>
                                <td><a href="{{ url("/file/surat_kesehatan/" . $p->file_id) }}" class="btn btn-sm btn-success">Cek</a></td>
                                <td><a href="{{ url("/file/cv/" . $p->file_id) }}" class="btn btn-sm btn-success">Cek</a></td>
                                <td><a href="{{ url("/file/ijazah/" . $p->file_id) }}" class="btn btn-sm btn-success">Cek</a></td>
                                <td><a href="{{ url("/file/ktp/" . $p->file_id) }}" class="btn btn-sm btn-success">Cek</a></td>
                                <td><a href="{{ url("/file/skck/" . $p->file_id) }}" class="btn btn-sm btn-success">Cek</a></td>
                                <td><a href="{{ url("/file/sertifikasi/" . $p->file_id) }}" class="btn btn-sm btn-success">Cek</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form class="modal-part" id="modal-tambah-peserta">
        <div class="form-group">
            <label>Nama</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input type="text" class="tambah-peserta-nama form-control" autocomplete="off" value="" name="nama" />
            </div>
        </div>
        <div class="form-group">
            <label>Username</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input type="text" class="tambah-peserta-username form-control" autocomplete="off" value="" name="username" />
            </div>
        </div>
        <div class="form-group">
            <label>Password</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                </div>
                <input type="password" class="tambah-peserta-password form-control" name="password" autocomplete="off" >
            </div>
        </div>
        <div class="form-group">
            <label>Level</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-sitemap"></i></div>
                </div>
                <select name="level" class="custom-select tambah-peserta-level">
                    <option value="WFO">Admin</option>
                    <option value="WFH">HRD</option>
                    <option value="WFH">Peserta</option>
                </select>
            </div>
        </div>
    </form>
</div>

@endsection
