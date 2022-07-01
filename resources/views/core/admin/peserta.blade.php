@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 col-sm-12 col-md-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header justify-content-between d-flex">
                <h4>Pengguna</h4>
                <a href={{ url('/user/create') }} class="btn btn-sm btn-primary">Tambah</a>
            </div>
            <div class="card-body">                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->username }}</td>
                            <td>Password</td>
                            <td>{{ $user->level }}</td>
                            <td>@if(Auth::user()->username != $user->username)<a href={{ url('/user/'.$user->user_id) }} class="btn btn-sm btn-primary">Edit</a>@endif</td>
                            <td>@if(Auth::user()->username != $user->username)<form action="{{ url('/user/'.$user->user_id) }}" method="POST">@csrf @method('delete')
                                <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm">Hapus</button>
                            </form>@endif</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
