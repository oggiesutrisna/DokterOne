<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Unicare Clinic Scanning System</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">

</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="https://www.unicare-clinic.com" class="h1"><b>Unicare QR System</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Nomor Surat : {{ $pasien->nomor_pid }}, </p>

        <div class="input-group mb-3">
          <input type="text" class="form-control" value="{{ $pasien->sampling_time }}" readonly>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" value="{{ $pasien->nama }}" readonly>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" value="{{ $pasien->dob }}" readonly>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" value="{{ $pasien->jenis_kelamin }}" readonly>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" value="{{ $pasien->nationality }}" readonly>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" value="{{ $pasien->result }}" readonly>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>

      </div>
      <!-- /.form-box -->
    </div><!-- /.card --> <br />
    <div class="text-center">
        Built with 💖 by <a href="https://twitter.com/@oggiesutrisna"> <b>Oggie Sutrisna </b></a>
    </div>
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
</body>

</html>
