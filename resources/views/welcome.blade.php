@extends('layouts.app')

@section('content')
<style>
  #myChart{
    width: 200px;
    height: 200px;
  }
</style>
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
                <p class="card-title">{{ count($pribadis) }}<p>
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
                <p class="card-title">{{ count($kelompoks) }}<p>
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
                <p class="card-title">{{ count($dosens) }}<p>
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
                <p class="card-title">{{ count($acaras) }}<p>
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
    @if (Auth::user()->role == 'admin')
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
                <p class="card-category">Surat Daftar Hadir</p>
                <p class="card-title">{{ count($hadirs) }}<p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-plus-square"></i>
            <a href="{{ route('surat_daftar_hadir.create') }}">Create</a>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>

  <div class="row">
    <div class="col-sm">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title judul">User</h5>
          {{-- <p class="card-category">24 Hours performance</p> --}}
        </div>
        <div class="card-body " style="height: 1000px">
          <canvas id="myChart"></canvas>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            {{-- <i class="fa fa-plus-square"></i> Updated 3 minutes ago --}}
          </div>
          {{-- <input type="hidden" name="" id="hidden" value="{{ route('') }}"> --}}
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"></script>
  <script>
    const judul = document.querySelector('.judul');
    // var data;

    async function getData(){
      judul.textContent = 'Loading..'
      try {
        judul.textContent = 'Data Persentase User'
        const res = await fetch("{{ route('chart') }}")
        const json = await res.json()

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Admin', 'Mahasiswa', 'Dosen'],
                datasets: [{
                    label: 'Data Persentase User',
                    data: [json.admin, json.mahasiswa, json.dosen],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                }]
            },
        });
        return json
      } catch (e) {
        judul.textContent = e
      }
    }

    getData()



    </script>
@endsection
