@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                Ajukan Surat Kelompok
            </span>
            <span>
                <a href="{{ route('tugas_kelompok.index') }}" class="btn btn-danger">Kembali</a>
            </span>
        </div>
        <div class="card-body">
            <form action="{{ route('tugas_kelompok.store') }}" method="POST">
                <input type="hidden" name="pemohon_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="status" value="proses">
                <input type="hidden" name="jenis_surat" value="tugas kelompok">
                @csrf
                <div class="form-group">
                    <label for="">Kepentingan</label>
                    <input type="text" name="judul" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Mahasiswa</label>
                    <select name="penerimas[]" id="" class="form-control select2" multiple>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->no_induk }} - {{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tujuan Surat</label>
                    <input type="text" name="kepada" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama Mitra</label>
                    <input type="text" name="nama_mitra" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat Mitra</label>
                    <input type="text" name="alamat" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control">
                </div>
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