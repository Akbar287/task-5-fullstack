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
                <form action="{{ url('user/' . $user->user_id) }}" method="POST"> @csrf @method('put')
                    <div class="form-group">
                        <label>Nama</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" class="@error('nama') is-invalid @enderror form-control" autocomplete="off" value="{{ $user->nama }}" name="nama" />
                        </div>
                        @error('nama') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" readonly class="@error('username') is-invalid @enderror form-control" autocomplete="off" value="{{ $user->username }}" name="username" />
                        </div>
                        @error('username') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input type="password" class="@error('password') is-invalid @enderror form-control" name="password" value="" autocomplete="off" >
                        </div>
                        <p class="helper-text"><i>*Isi jika ingin diubah</i></p>
                        @error('password') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-sitemap"></i></div>
                            </div>
                            <select name="level" class="custom-select @error('level') is-invalid @enderror">
                                <option {{ ($user->level == "Admin" ? 'selected' : '') }} value="Admin">Admin</option>
                                <option {{ ($user->level == "hrd" ? 'selected' : '') }} value="hrd">HRD</option>
                                <option {{ ($user->level == "peserta" ? 'selected' : '') }} value="peserta">Peserta</option>
                            </select>
                        </div>
                        @error('level') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
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
