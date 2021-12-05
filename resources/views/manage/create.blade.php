@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Buat User
        </div>
        <div class="card-body">
            <form action="{{ route('manage.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">No HP</label>
                    <input type="number" name="no_hp" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nomor Induk</label>
                    <input type="number" name="no_induk" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role" id="" class="form-control">
                        <option value="">Pilih Role...</option>
                        <option value="mahasiswa">Mahasiswa</option>
                        <option value="admin">Admin</option>
                        <option value="dosen">Dosen</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection