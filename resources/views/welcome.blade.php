@extends('layouts.app')

@section('content')
<div class="row">
  @if(Auth::user()->role != 'dosen')
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-email-85 text-warning"></i>
              </div>
            </div>

            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Tugas Pribadi</p>
                <p class="card-title">{{ count(App\Models\Surat::where('jenis_surat', 'tugas pribadi')->get()) }}<p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-plus-square"></i>
            <a href="{{ route('tugas_pribadi.create') }}">Create</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-email-85 text-success"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Tugas Kelompok</p>
                <p class="card-title">{{ count(App\Models\Surat::where('jenis_surat', 'tugas kelompok')->get()) }}<p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-plus-square"></i>
            <a href="{{ route('tugas_kelompok.create') }}">Create</a>
          </div>
        </div>
      </div>
    </div>
    @endif
    @if(Auth::user()->role != 'mahasiswa')
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-email-85 text-danger"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Tugas Dosen</p>
                <p class="card-title">{{ count(App\Models\Surat::where('jenis_surat', 'tugas dosen')->get()) }}<p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-plus-square"></i>
            <a href="{{ route('tugas_dosen.create') }}">Create</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-email-85 text-primary"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Berita Acara</p>
                <p class="card-title">{{ count(App\Models\Surat::where('jenis_surat', 'berita acara')->get()) }}<p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-plus-square"></i>
            <a href="{{ route('berita_acara.create') }}">Create</a>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title">User</h5>
          {{-- <p class="card-category">24 Hours performance</p> --}}
        </div>
        <div class="card-body ">
          <table class="table">
              <thead class="thead-dark">
                  <tr>
                    {{-- <th>#</th> --}}
                    <th scope="col">Jumlah Dosen</th>
                    <th scope="col">Jumlah Mahasiswa</th>
                    <th scope="col">Jumlah Admin</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>
                        {{ count(App\Models\User::where('role', 'dosen')->get()) }}
                    </td>
                    <td>
                        {{ count(App\Models\User::where('role', 'mahasiswa')->get()) }}
                    </td>
                    <td>
                        {{ count(App\Models\User::where('role', 'admin')->get()) }}
                    </td>
                </tr>
              </tbody>
          </table>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            {{-- <i class="fa fa-plus-square"></i> Updated 3 minutes ago --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
