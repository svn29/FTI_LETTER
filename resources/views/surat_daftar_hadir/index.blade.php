@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>
                Surat Daftar Hadir
            </span>
            <div>
                <a href="{{ route('surat_daftar_hadir.create') }}" class="btn btn-primary">+ Buat</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="dark">
                    <tr>
                        <th scope="col">Kode Surat</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Pembicara</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($surats as $item)
                        <tr>
                            <th>
                                {{$item->kode_surat}}
                            </th>
                            <td>
                                {{$item->nama_kegiatan}}
                            </td>
                            <td>
                                {{$item->tanggal}}
                            </td>
                            <td>
                                {{Carbon\Carbon::parse($item->start)->format('H : i')}} - {{Carbon\Carbon::parse($item->end)->format('H : i')}}
                            </td>
                            <td>
                                {{$item->tempat}}
                            </td>
                            <td>
                                {{$item->pembicara}} 
                            </td>
                            <td>
                                <span class="badge badge-info">{{$item->status}}</span>
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('surat_daftar_hadir.show', $item->id) }}" class="btn btn-warning">Detail</a>
                                <form action="{{ route('surat_daftar_hadir.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger mx-3" onclick="return confirm('Yakin Ingin Menghapusnya?')">Hapus</button>
                                </form>
                                <a href="{{ route('surat_daftar_hadir.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('surat_daftar_hadir.unduh', $item->id) }}" class="btn btn-info ml-3">Unduh</a>
                                {{-- @if ($item->status != 'diterima' && Auth::user()->role == 'mahasiswa')
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
                                   @endif --}}
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
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">

                {{ $surats    ->links('vendor.bootstrap-4') }}

            </ul>
        </div>
    </div>
@endsection