@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                Edit Surat Dosen
            </span>
            <span>
                <a href="{{ route('surat_dosen.index') }}" class="btn btn-danger">Kembali</a>
            </span>
        </div>
        <div class="card-body">
            <form action="{{ route('tugas_dosen.update', $surat->id) }}" method="POST">
                <input type="hidden" name="pemohon_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="status" value="{{ $surat->status }}">
                <input type="hidden" name="jenis_surat" value="tugas dosen">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" value="{{ $surat->tanggal }}" name="tanggal" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tema</label>
                    <input type="text" name="tema" value="{{ $surat->tema }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tempat</label>
                    <input type="text" name="alamat" value="{{ $surat->alamat }}" class="form-control">
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