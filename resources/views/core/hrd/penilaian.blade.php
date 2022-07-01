@extends('layouts.app')

@section('content')
<div class="row">
    @if(session('status')) {!! session('status') !!} @endif
    <div class="col-12 col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Penilaian</h4>
                <div class="card-header-action">
                    <a href="{{ url('/input-nilai/create') }}" class="btn btn-primary">Input Nilai</a>
                </div>
            </div>
            <div class="card-body">                
                <div style="width: 100%; height: 100%;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Nama</td>
                                <td>Kesehatan</td>
                                <td>Pengalaman</td>
                                <td>Pendidikan</td>
                                <td>Sertifikasi</td>
                                <td>Edit</td>
                                <td>Hapus</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peserta as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->kesehatan }}</td>
                                <td>{{ $p->pengalaman }}</td>
                                <td>{{ $p->pendidikan }}</td>
                                <td>{{ $p->sertifikasi }}</td>
                                <td><a href="{{ url("/input-nilai/" . $p->penilaian_id . "/edit") }}" class="btn btn-primary">Edit</a></td>
                                <td>
                                <form action="{{ url('/input-nilai/'.$p->penilaian_id) }}" method="POST">@csrf @method('delete')
                                    <button type="submit" title="Hapus Data" class="btn btn-danger">Hapus</button>
                                </form></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
