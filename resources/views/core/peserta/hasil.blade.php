@extends('layouts.app')

@section('content')
<div class="row">
    @if(session('status')) {!! session('status') !!} @endif
    @foreach($lowongan as $l)
    <div class="col-12 col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>{{$l['jabatan']}}</h4>
            </div>
            <div class="card-body">                
                <div style="width: 100%; height: 100%;">
                    <p>{{ $l['detail'] }}</p>
                    <button class="btn {{ $l['hasil_seleksi'] == null ? 'btn-primary' : 'btn-success' }} btn-lg cek-hasil" data-check="{{ $l['hasil_seleksi'] }}">{{ $l['hasil_seleksi'] == null ? 'Apply' : 'Hasil Seleksi' }}</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
