@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit User
        </div>
        <div class="card-body">
            <form action="{{ route('manage.update', $user->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" value="{{ $user->username }}" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" value="{{ $user->nama }}" name="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" value="{{ $user->email }}" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">No HP</label>
                    <input type="number" value="{{ $user->no_hp }}" name="no_hp" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nomor Induk</label>
                    <input type="number" value="{{ $user->no_induk }}" name="no_induk" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role" id="" class="form-control">
                        <option value="">Pilih Role...</option>
                        <option value="mahasiswa" {{ $user->role == 'mahasiswa'  ? 'selected' : ''}}>Mahasiswa</option>
                        <option value="admin" {{ $user->role == 'admin'  ? 'selected' : ''}}>Admin</option>
                        <option value="dosen" {{ $user->role == 'dosen'  ? 'selected' : ''}}>Dosen</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection