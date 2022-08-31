<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SistemPakar | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page"  style="background: url({{asset('/image/laut.png')}});">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ asset('adminlte') }}/index2.html" class="text-white">
    <div class="col-10"> 
    <img src="/image/ikan.png" alt="logo" style="width: 100px; height: 90px;">
    <br> 
    <b>Sign In</b></a>
</div>
  </div>
  <!-- /.login-logo -->
 
    @if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ route('login') }}" method="post">
        @csrf
         <label class="text-white" for="inputEmailAddress">Username</label>
        <div class="input-group mb-3 col-10">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <label class="text-white" for="inputEmailAddress">Password</label>
        <div class="input-group mb-1 col-10">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-10"></div>
          <!-- /.col -->
          <br>
          <div class="col-10">
            <div class="text-white" >
            <button type="submit" class="btn  btn-block" style="background-color: #99bfc6;">Sign In</button>
 </div>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte') }}/dist/js/adminlte.min.js"></script>
</body>
</html>
