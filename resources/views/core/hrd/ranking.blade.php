@extends('layouts.app')

@section('content')
<div class="row">
    @if(session('status')) {!! session('status') !!} @endif
    <div class="col-12 col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Perangkingan</h4>
            </div>
            <div class="card-body">                
                <div style="width: 100%; height: 100%;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>Rangking</td>
                                <td>Nama</td>
                                <td>Kesehatan</td>
                                <td>Pengalaman</td>
                                <td>Pendidikan</td>
                                <td>Sertifikasi</td>
                                <td>Hasil</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peserta as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p['nama'] }}</td>
                                <td>{{ $p['kesehatan'] }}</td>
                                <td>{{ $p['pengalaman'] }}</td>
                                <td>{{ $p['pendidikan'] }}</td>
                                <td>{{ $p['sertifikasi'] }}</td>
                                <td>{{ $p['hasil'] }}</td>
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
