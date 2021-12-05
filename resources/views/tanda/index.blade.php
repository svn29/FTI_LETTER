@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>
                Signature
            </span>
            <div>
                <a href="{{ route('tanda.create') }}" class="btn btn-primary">+ Buat Tanda Tangan</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($signs as $item)
                        <tr>
                            <th>
                                {{$loop->iteration}}
                            </th>
                            <td>
                                {{$item->user->nama}}
                            </td>
                            <td>
                                <form action="{{ route('tanda.destroy', $item->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                                </form>
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