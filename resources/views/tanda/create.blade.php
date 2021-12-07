@extends('layouts.app')

@section('content')
<style>
    .kbw-signature { width: 50%; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
</style>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                Buat Tanda Tangan
            </span>
            <span>
                <a href="{{ route('tanda.index') }}" class="btn btn-danger">Kembali</a>
            </span>
        </div>
        <div class="card-body">
            <form action="{{ route('tanda.store') }}" method="POST">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                @csrf
                @error('user_id')
                    <div class="form-group">
                        <div class="alert alert-danger">{{ $message }}</div>
                    </div>
                @enderror
                <div class="form-group">
                    <label for="">Tanda Tangan</label>
                    <div id="sig"></div>
                    <textarea id="signature64" class="form-control" name="signed" style="display: none"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
        $('.select2').select2();
        $(document).ready(function() {
            // alert('halo')
        });
    </script>
@endsection