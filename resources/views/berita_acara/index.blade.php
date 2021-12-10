@extends('layouts.app')

@section('content')
    <div class="card">
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
                    @forelse ($surats as $item)
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
                                @if ($item->status == 'diterima')
                                    <span class="badge badge-success">{{$item->status}}</span>
                                @elseif($item->status == 'ditolak')
                                    <span class="badge badge-danger">{{$item->status}}</span>
                                @else
                                    <span class="badge badge-info">{{$item->status}}</span>
                                @endif
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
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">

                {{ $surats    ->links('vendor.bootstrap-4') }}

            </ul>
        </div>
    </div>
@endsection