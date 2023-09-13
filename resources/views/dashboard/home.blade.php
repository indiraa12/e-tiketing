@extends('dashboard/layouts/main')
@section('konten')

<div class="main-panel">
  <div class="content-wrapper">
    @if (Auth::user()->role_id == 1)
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome, @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
              {{ auth()->user()->name }}
          @endif</h3>
            <h6 class="font-weight-normal mb-0"> Maksimalkan pengalaman Anda di sini!</h6>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-people mt-auto">
            <img src="{{ asset('skydash/template') }}/images/dashboard/people.svg" alt="people">
            <div class="weather-info">
              <div class="d-flex">
                <div>
                  <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                </div>
                <div class="ml-2">
                  <h4 class="location font-weight-normal">Bawang</h4>
                  <h6 class="font-weight-normal">Indonesia</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4">Today’s Bookings</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4">Total Bookings</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <p class="mb-4">Number of Meetings</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Number of Clients</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Order Details</p>
           
        </div>
      </div>
    </div>
    </div>

    @else
<!-- Halaman Penumpang -->
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Welcome, @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
          {{ auth()->user()->name }}!
      @endif</h3>
        <h6 class="font-weight-normal mb-0"> Maksimalkan pengalaman Anda di sini!</h6>
      </div>
    </div>
  </div>
</div>

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Mau Kemana Hari Ini?</h4>
      <hr class="hr" />

      <form action="/dashboard" method="POST" class="form-inline">
        @csrf
        <div class="row mb-3">
          <div class="col-md-10">
              <div class="row mb-3">
                  <div class="col-md-3 mb-4">
                    <label for="dari" class="col-sm-2 col-form-label">Dari</label>
                    <select name="rute_id" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" required>
                      <option value="" disabled selected>Masukan Tujuan di Sini </option>
                      @foreach ($rute as $item)
                          <option value="{{ $item->id }}">{{ $item->rute_awal }}</option>
                      @endforeach
                  </select>
                  </div>
              </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-10">
              <div class="row mb-3">
                  <div class="col-md-3 mb-4">
                    <label for="dari" class="col-sm-2 col-form-label">Ke</label>
                    <select name="rute_id" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" required>
                      <option value="" disabled selected>Masukan Tujuan Disini</option>
                      @foreach ($rute as $item)
                      <option value="{{ $item->id }}">{{ $item->rute_akhir }}</option>
                  @endforeach
                  </select>
                </div>
              </div>
            </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-10">
              <div class="row mb-3">
                  <div class="col-md-10 mb-4">
                      <label for="tgl_berangkat" class="col-sm-10 col-form-label">Berangkat</label>
                      <input type="date" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="tgl_berangkat">
                  </div>
              </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-10">
              <div class="row mb-3">
                  <div class="col-md-10 mb-4">
                      <label for="dari" class="col-sm-10 col-form-label">Jumlah </label>
                      <input type="number" name="jumlah_kursi" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jumlah Tiket">
                  </div>
              </div>
          </div>
        </div>

        
        <button type="submit" class="btn btn-primary">Cari Tiket</button>
        
        {{-- <div class="row mb-10">
          <div class="col-md-10">
              <div class="row mb-10">
                  <div class="col-sm-10 mb-4">
                          <form action="dashboard/home" method="GET">
                            <button class="btn btn-primary" type="submit" id="button-addon2"><i class='icon-search'></i></button>
                            </form>
                  </div>
              </div>
          </div>
        </div> --}}
      </form>
    </div>
  </div>
</div>

<!-- Tampilkan hasil pencarian jika ada -->
@if(isset($tiket) && count($tiket) > 0)
<h2>Hasil Pencarian:</h2>
<ul>
    @foreach($tiket as $data)
        <li>
            <!-- Tampilkan informasi tiket -->
            Rute: {{ $data->rute_awal }} - {{ $data->rute_akhir }}<br>
            Tanggal Berangkat: {{ $data->tgl_berangkat }}<br>
            Jumlah Tiket Tersedia: {{ $data->jumlah_tiket }}<br>
        </li>
    @endforeach
</ul>
@endif


    @endif
  <!-- content-wrapper ends -->
</div>
@endsection