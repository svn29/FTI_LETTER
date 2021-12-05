@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>
                Manage User
            </span>
            <div>
                <a href="{{ route('manage.create') }}" class="btn btn-primary">+ Buat User</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $item)
                        <tr>
                            <th>
                                {{$loop->iteration}}
                            </th>
                            <td>
                                {{$item->nama}}
                            </td>
                            <td>
                                {{$item->email}}
                            </td>
                            <td>
                                {{$item->role}}
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('manage.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('manage.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger ml-2">Hapus</button>
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