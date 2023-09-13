@extends('dashboard/layouts/main')
@section('konten')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" align="center" >Tambah Transportasi</h4>
              <form method="POST" action="{{ route('bandara.store') }}">
                @csrf
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-company">Kode</label>
                  <div class="col-sm-10">
                    <input type="text" name="kode" class="form-control" id="basic-default-company"
                    placeholder="Masukkan kode" />
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Transportasi</label>
                  <div class="col-sm-10">
                      <input type="text" name="keterangan" class="form-control" id="basic-default-company"
                          placeholder="Masukkan keterangan" />
                  </div>
              </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company">Jumlah Kursi</label>
                    <div class="col-sm-10">
                        <input type="number" name="jumlah_kursi" class="form-control" id="basic-default-company"
                            placeholder="Masukkan jumlah kursi" />
                    </div>
                </div>

               

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="type_id">Keterangan</label>
                  <div class='col-sm-10'>
                      <select name="type_id" class="form-control" required>
                          <option value="" disabled selected>Pilih Transportasi</option>
                          @foreach ($type as $item)
                              <option value="{{ $item->id }}">{{ $item->nama_type }} - {{ $item->keterangan }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
               
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 Indi Rahmadani</span>
    </footer>
    <!-- partial -->
  </div>
@endsection