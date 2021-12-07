@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Arsip Surat
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>
                        Surat Tugas Pribadi
                    </span>
                    <div>
                        <a href="{{ route('tugas_pribadi.create') }}" class="btn btn-primary">+ Ajukan</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="dark">
                            <tr>
                                <th scope="col">Kode Surat</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Kepada</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pribadis as $item)
                                <tr>
                                    <th>
                                        {{$item->no_surat}}
                                    </th>
                                    <td>
                                        {{$item->user->nama}}
                                    </td>
                                    <td>
                                        {{$item->judul}}
                                    </td>
                                    <td>
                                        {{$item->kepada}}
                                    </td>
                                    <td>
                                        {{$item->alamat}}
                                    </td>
                                    <td>
                                        {{$item->keterangan}}
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{$item->status}}</span>
                                    </td>
                                    <td>
                                        @if ($item->status != 'diterima' && Auth::user()->role == 'mahasiswa')
                                           <a href="{{ route('tugas_pribadi.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                           <form action="{{ route('tugas_pribadi.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapusnya??')">Hapus</button>
                                            </form>
                                            @elseif(Auth::user()->role == 'admin' && $item->status != 'diterima')
                                            <a href="{{ route('tugas_pribadi.validasi', $item->id) }}" class="btn btn-info">Validasi</a>
                                           @endif
                                           @if ($item->status == 'diterima')
                                            <a href="{{ route('tugas_pribadi.download', $item->id) }}" class="btn btn-warning btn-block">Unduh</a>
                                           @endif
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td>
                                    Belum Ada Data
                                </td>
                            </tr>
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between">
                    <span>
                        Surat Tugas Kelompok
                    </span>
                    <div>
                        <a href="{{ route('tugas_kelompok.create') }}" class="btn btn-primary">+ Ajukan</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="dark">
                            <tr>
                                <th scope="col">Kode Surat</th>
                                <th scope="col">Nama Pemohon</th>
                                <th scope="col">Nama Mitra</th>
                                <th scope="col">Alamat Mitra</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Kepentingan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kelompoks as $item)
                                <tr>
                                    <th>
                                        {{$item->no_surat}}
                                    </th>
                                    <td>
                                        {{$item->user->nama}}
                                    </td>
                                    <td>
                                        {{$item->nama_mitra}}
                                    </td>
                                    <td>
                                        {{$item->alamat}}
                                    </td>
                                    <td>
                                        {{$item->keterangan}}
                                    </td>
                                    <td>
                                        {{$item->tanggal}}
                                    </td>
                                    <td>
                                        {{$item->kepada}}
                                    </td>
                                    <td>
                                        {{$item->judul}}
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{$item->status}}</span>
                                    </td>
                                    <td>
                                        @if ($item->status != 'diterima' && Auth::user()->role == 'mahasiswa')
                                           <a href="{{ route('tugas_kelompok.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                           <form action="{{ route('tugas_kelompok.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapusnya??')">Hapus</button>
                                            </form>
                                            @elseif(Auth::user()->role == 'admin' && $item->status != 'diterima')
                                            <a href="{{ route('tugas_kelompok.validasi', $item->id) }}" class="btn btn-info">Validasi</a>
                                           @endif
                                           @if ($item->status == 'diterima')
                                            <a href="{{ route('tugas_kelompok.download', $item->id) }}" class="btn btn-warning btn-block">Unduh</a>
                                           @endif
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td>
                                    Belum Ada Data
                                </td>
                            </tr>
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between">
                    <span>
                        Berita Acara
                    </span>
                    <div>
                        <a href="{{ route('berita_acara.create') }}" class="btn btn-primary">+ Ajukan</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="dark">
                            <tr>
                                <th scope="col">Kode Surat</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($acaras as $item)
                                <tr>
                                    <th>
                                        {{$item->no_surat}}
                                    </th>
                                    <td>
                                        {{$item->user->nama}}
                                    </td>
                                    <td>
                                        {{$item->judul}}
                                    </td>
                                    <td>
                                        {{$item->keterangan}}
                                    </td>
                                    <td>
                                        {{$item->tanggal}}
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{$item->status}}</span>
                                    </td>
                                    <td>
                                        @if ($item->status != 'diterima' && Auth::user()->role == 'dosen')
                                           <a href="{{ route('berita_acara.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                           <form action="{{ route('berita_acara.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapusnya??')">Hapus</button>
                                            </form>
                                            @elseif(Auth::user()->role == 'admin' && $item->status != 'diterima')
                                            <a href="{{ route('berita_acara.validasi', $item->id) }}" class="btn btn-info">Validasi</a>
                                           @endif
                                           @if ($item->status == 'diterima')
                                            <a href="{{ route('berita_acara.download', $item->id) }}" class="btn btn-warning btn-block">Unduh</a>
                                           @endif
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td>
                                    Belum Ada Data
                                </td>
                            </tr>
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between">
                    <span>
                        Surat Tugas Dosen
                    </span>
                    <div>
                        <a href="{{ route('tugas_dosen.create') }}" class="btn btn-primary">+ Ajukan</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="dark">
                            <tr>
                                <th scope="col">Kode Surat</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nomor Induk</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Tema</th>
                                <th scope="col">Tempat</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dosens as $item)
                                <tr>
                                    <th>
                                        {{$item->no_surat}}
                                    </th>
                                    <td>
                                        {{$item->user->nama}}
                                    </td>
                                    <td>
                                        {{$item->user->no_induk}}
                                    </td>
                                    <td>
                                        {{$item->tanggal}}
                                    </td>
                                    <td>
                                        {{$item->tema}}
                                    </td>
                                    <td>
                                        {{$item->alamat}}
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{$item->status}}</span>
                                    </td>
                                    <td class="d-flex">
                                        @if ($item->status != 'diterima' && Auth::user()->role == 'dosen')
                                           <a href="{{ route('tugas_dosen.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                           <form action="{{ route('tugas_dosen.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapusnya??')">Hapus</button>
                                            </form>
                                            @elseif(Auth::user()->role == 'admin' && $item->status != 'diterima')
                                            <a href="{{ route('tugas_dosen.validasi', $item->id) }}" class="btn btn-info">Validasi</a>
                                           @endif
                                           @if ($item->status == 'diterima')
                                            <a href="{{ route('tugas_dosen.download', $item->id) }}" class="btn btn-warning btn-block">Unduh</a>
                                           @endif
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td>
                                    Belum Ada Data
                                </td>
                            </tr>
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection