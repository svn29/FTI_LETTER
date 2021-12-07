@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>
                <b>Tanda Tangan</b></br>
                (Hanya boleh dilakukan oleh dosen pejabat)
            </span>
            <div>
                <a href="{{ route('tanda.create') }}" class="btn btn-primary">+ Buat Tanda Tangan</a>
            </div>
        </div>
        <div class="card-body">
            @if ($sign == NULL)
                <div class="form-group">
                    <label for="">Kamu Belum Buat Tanda Tangan</label>
                </div>
            @else
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" readonly value="{{ $sign->user->nama }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tanda Tangan</label>
                <img src="{{ asset('upload/'.$sign->sign) }}" alt="">
            </div>
            <div class="form-group">
                <form action="{{ route('tanda.destroy', $sign->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Hapus Tanda Tangan</button>
                </form>
            </div>
            @endif
        </div>
    </div>
@endsection
