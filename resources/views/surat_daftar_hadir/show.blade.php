@extends('layouts.app')

@section('content')
<style>
    .kbw-signature { width: 50%; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
</style>
    <div class="card">
        <div class="card-header">
            Detail
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Nama Kegiatan</label>
                <input type="text" disabled name="nama_kegiatan" value="{{ $surat->nama_kegiatan }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" disabled name="tanggal" value="{{ $surat->tanggal }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tempat</label>
                <input type="text" disabled name="tempat" value="{{ $surat->tempat }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nama Pembicara</label>
                <input type="text" disabled name="pembicara" value="{{ $surat->pembicara }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Jumlah Peserta</label>
                <input type="number" name="jumlah_peserta" value="{{ $surat->jumlah_peserta }}" class="form-control">
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="">Dari Jam</label>
                  <input type="time" disabled class="form-control" value="{{ $surat->start }}" name="start">
                </div>
                <div class="col">
                    <label for="">Sampai Jam</label>
                  <input type="time" disabled class="form-control" value="{{ $surat->end }}" name="end">
                </div>
            </div>
        </div>
    </div>


    <script>
        var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    </script>
@endsection