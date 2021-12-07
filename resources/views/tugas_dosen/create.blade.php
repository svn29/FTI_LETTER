@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                Ajukan Tugas Dosen
            </span>
            <span>
                <a href="{{ route('tugas_dosen.index') }}" class="btn btn-danger">Kembali</a>
            </span>
        </div>
        <div class="card-body">
            <form action="{{ route('tugas_dosen.store') }}" method="POST">
                <input type="hidden" name="pemohon_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="status" value="proses">
                <input type="hidden" name="jenis_surat" value="tugas dosen">
                @csrf
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tema</label>
                    <input type="text" name="tema" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tempat</label>
                    <input type="text" name="alamat" class="form-control">
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