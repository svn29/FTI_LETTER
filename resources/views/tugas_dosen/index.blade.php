@extends('layouts.app')

@section('content')
    <div class="card">
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
                    @forelse ($surats as $item)
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
                                @if ($item->status == 'diterima')
                                    <span class="badge badge-success">{{$item->status}}</span>
                                @elseif($item->status == 'ditolak')
                                    <span class="badge badge-danger">{{$item->status}}</span>
                                @else
                                    <span class="badge badge-info">{{$item->status}}</span>
                                @endif
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
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">

                {{ $surats    ->links('vendor.bootstrap-4') }}

            </ul>
        </div>
    </div>
@endsection