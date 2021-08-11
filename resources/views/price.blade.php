@extends('layouts.admin')
@section('title') Feature Pass @endsection

@section('content')
<div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <strong>Starter Pack</strong>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <ul>
            <li>50 QR Code Stack / Month</li>
            <li>150 scan available</li>
            <li>Live Support</li>
            <li>Up to 5 Account</li>
            <li>No backup for databases</li>
          </ul>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <h3> Rp. 99.000,- / Month </h3>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- ./col -->
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">
             <strong> Premium Pack</strong>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <ul>
              <li>1500 QR Code Stack / Month</li>
              <li>15000 scan available</li>
              <li>Live Support</li>
              <li>Up to 10 Account</li>
              <li>No Backup for databases</li>
            </ul>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
              <h3> Rp. 299.000,- / Month </h3>
          </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- ./col -->
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">
              <strong>Ultimate Pack (Best) </strong>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <ul>
              <li>5000 QR Code Stack / Month</li>
              <li>50000 scan available</li>
              <li>Live Support</li>
              <li>Up to 20 Account</li>
              <li>Backup database every month</li>
            </ul>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
              <h3> Rp. 699.000,- / Month </h3>
          </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- ./col -->
  </div>

  {{-- Description tag --}}
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-text-width"></i>
            Terms and Conditions
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <dl>
            <dt>PRODUCTS</dt>
            <dd>Aplikasi ini dibuat oleh saya<strong> <a href="https://twitter.com/@oggiesutrisna">(Oggie Sutrisna)</a></strong> Aplikasi ini sudah berlisensi EULA, Ketika anda membeli package yang sudah ditawarkan anda otomatis menyetujui semua syarat yang EULA berlakukan diantaranya adalah mengubah, mengedit, mengklaim dll. Jika ketahuan melanggar akan di bawa ke <strong>ranah hukum.</strong> </dd>
            <dt>HOW TO PAY</dt>
            <dd>Mandiri <strong>1450012988677</strong> atas nama <strong>I Putu Oggie Sutrisna Ady</strong> & Kirim screenshot bukti pengiriman ke <a href="https://api.whatsapp.com/send?phone=087846048999"> <strong>SINI</strong> </a></dd>
          </dl>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    <!-- ./col -->

@endsection
