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
        <div class="card-header">
            Buat Tanda Tangan
        </div>
        <div class="card-body">
            <form action="{{ route('tanda.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label for="">Dosen</label>
                        <select name="user_id" id="select2" class="form-control select2">
                            <option value="">Pilih Dosen...</option>
                            @forelse ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>
                </div>
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