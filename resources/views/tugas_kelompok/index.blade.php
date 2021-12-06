@extends('layouts.app')

@section('content')
    <div class="card">
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
                    @forelse ($surats as $item)
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
@endsection