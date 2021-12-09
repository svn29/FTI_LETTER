@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                Surat Daftar Hadir
            </span>
            <span>
                <a href="{{ route('surat_daftar_hadir.index') }}" class="btn btn-primary">Kembali</a>
            </span>
        </div>
        <div class="card-body">
            <form action="{{ route('surat_daftar_hadir.update', $surat->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" value="{{ $surat->nama_kegiatan }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ $surat->tanggal }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tempat</label>
                    <input type="text" name="tempat" value="{{ $surat->tempat }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama Pembicara</label>
                    <input type="text" name="pembicara" value="{{ $surat->pembicara }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Jumlah Peserta</label>
                    <input type="number" name="jumlah_peserta" value="{{ $surat->jumlah_peserta }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tanda Tangan Dosen</label>
                    <select name="sign_id" id="" class="form-control select2">
                        <option value="">Pilih Dosen..</option>
                        @foreach ($signs as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $surat->sign_id ? 'selected' : '' }}>{{ $item->user->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="">Dari Jam</label>
                      <input type="time" value="{{ $surat->start }}" class="form-control" name="start">
                    </div>
                    <div class="col">
                        <label for="">Sampai Jam</label>
                      <input type="time" value="{{ $surat->end }}" class="form-control" name="end">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('.select2').select2();
    </script>
@endsection