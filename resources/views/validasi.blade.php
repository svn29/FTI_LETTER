@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Validasi
        </div>
        <div class="card-body">
            <form action="{{ route('tugas_pribadi.validate', $surat->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control stats">
                        <option value="proses" {{ $surat->status == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="ditolak" {{ $surat->status == 'ditolak' ? 'selected' : '' }}>Tolak</option>
                        <option value="diterima" {{ $surat->status == 'diterima' ? 'selected' : '' }}>Terima</option>
                    </select>
                </div>
                <div class="form-group hilang" style="display: none">
                    <label for="">Tanda Tangan</label>
                    <select name="sign_id" id="" class="form-control select2">
                        <option value="">Pilih Tanda Tangan</option>
                        @foreach ($signs as $item)
                            <option value="{{ $item->id }}">{{ $item->user->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let stats = document.querySelector('.stats')
 let hilang = document.querySelector('.hilang')
//    stats.addEventListener('change', function(e) {
//        if(e.target.value == 'disetujui'){
//             hilang.style.display == 'none
//             alert('disetujui')
//        }
//    })
 stats.addEventListener('change', (e) => {
 if(e.target.value == 'diterima'){
     hilang.style.display = 'block'
 }else{
     hilang.style.display = 'none'
 }
})
    </script>
@endsection