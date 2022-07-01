@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Pelamar</h4>
            </div>
            <div class="card-body">     
                @if(session('status')) {!! session('status') !!} @endif
                <form action="{{ url('input-nilai') }}" method="POST"> @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <select name="nama" class="custom-select @error('nama') is-invalid @enderror" aria-placeholder="Pilih Peserta">
                                @foreach($nama as $n)
                                <option value="{{ $n->user_id }}">{{$n->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('nama') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Kesehatan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="number" class="form-control @error('kesehatan') is-invalid @enderror" autocomplete="off" value="" name="kesehatan" />
                        </div>
                        @error('kesehatan') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Pengalaman</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="number" class="form-control @error('pengalaman') is-invalid @enderror" autocomplete="off" value="" name="pengalaman" />
                        </div>
                        @error('pengalaman') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Pendidikan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="number" class="form-control @error('pendidikan') is-invalid @enderror" autocomplete="off" value="" name="pendidikan" />
                        </div>
                        @error('pendidikan') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Sertifikasi</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="number" class="form-control @error('sertifikasi') is-invalid @enderror" autocomplete="off" value="" name="sertifikasi" />
                        </div>
                        @error('sertifikasi') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
