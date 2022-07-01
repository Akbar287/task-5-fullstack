@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Pengguna</h4>
            </div>
            <div class="card-body">     
                @if(session('status')) {!! session('status') !!} @endif
                <form action="{{ url('peserta') }}" method="POST"> @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" class=" form-control @error('nama') is-invalid @enderror" autocomplete="off" value="" name="nama" />
                        </div>
                        @error('nama') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" class="@error('username') is-invalid @enderror form-control" autocomplete="off" value="" name="username" />
                        </div>
                        @error('username') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input type="password" class=" form-control @error('password') is-invalid @enderror" name="password" autocomplete="off" >
                        </div>
                        @error('password') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-sitemap"></i></div>
                            </div>
                            <select name="level" class="custom-select @error('level') is-invalid @enderror ">
                                <option value="Admin">Admin</option>
                                <option value="hrd">HRD</option>
                                <option value="peserta">Peserta</option>
                            </select>
                            @error('level') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                        </div>
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
