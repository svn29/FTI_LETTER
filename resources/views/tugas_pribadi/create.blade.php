@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Ajukan Surat Pribadi
        </div>
        <div class="card-body">
            <form action="{{ route('tugas_pribadi.store') }}" method="POST">
                <input type="hidden" name="pemohon_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="status" value="proses">
                <input type="hidden" name="jenis_surat" value="tugas pribadi">
                @csrf
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="judul" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Kepada</label>
                    <input type="text" name="kepada" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>
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