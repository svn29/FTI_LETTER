@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Surat Kelompok
        </div>
        <div class="card-body">
            <form action="{{ route('tugas_kelompok.update', $surat->id) }}" method="POST">
                <input type="hidden" name="pemohon_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="status" value="{{ $surat->status }}">
                <input type="hidden" name="jenis_surat" value="tugas kelompok">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Kepentingan</label>
                    <input type="text" name="judul" value="{{ $surat->judul }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Mahasiswa</label>
                    <select name="penerimas[]" id="" class="form-control select2" multiple>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}" @foreach ($surat->penerimas as $s)
                                {{ $s->id == $item->id ? 'selected' : '' }}
                            @endforeach>{{ $item->no_induk }} - {{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tujuan Surat</label>
                    <input type="text" name="kepada" value="{{ $surat->kepada }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama Mitra</label>
                    <input type="text" name="nama_mitra" value="{{ $surat->nama_mitra }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat Mitra</label>
                    <input type="text" name="alamat" value="{{ $surat->alamat }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ $surat->tanggal }}" class="form-control">
                </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" value="{{ $surat->keterangan }}" class="form-control">
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