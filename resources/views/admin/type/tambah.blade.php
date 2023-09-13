@extends('dashboard/layouts/main')
@section('konten')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" align="center" >Tambah Type Transportasi</h4>
              <form method="POST" action="{{ route('type.store') }}">
                @csrf
                
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Transportasi</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_type" class="form-control" id="basic-default-company"
                            placeholder="Masukkan nama_type" />
                    </div>
                </div>
              
               
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
                    <div class='col-sm-10'>
                        <select name="keterangan" class="form-control" required>
                            <option value="" disabled selected>Pilih Disini</option>
                            <option value="Pesawat">Pesawat</option>
                            <option value="Kereta">Kereta</option>
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