@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                Edit Berita Acara
            </span>
            <span>
                <a href="{{ route('berita_acara.index') }}" class="btn btn-danger">Kembali</a>
            </span>
        </div>
        <div class="card-body">
            <form action="{{ route('berita_acara.update', $surat->id) }}" method="POST">
                <input type="hidden" name="pemohon_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="status" value="{{ $surat->status }}">
                <input type="hidden" name="jenis_surat" value="berita acara">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Nama Kegiatan</label>
                    <input type="text" name="judul" value="{{ $surat->judul }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" name="keterangan" value="{{ $surat->keterangan }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ $surat->tanggal }}" class="form-control">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
        $('.select2').select2();
        $(document).ready(function() {
            // alert('halo')
        });
    </script>
@endsection