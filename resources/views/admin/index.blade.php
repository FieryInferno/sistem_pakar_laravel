@extends('template')
@section('konten')
  <section class="content">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
            <h3>{{$penyakit}}</h3>
            <p>Data Penyakit</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="/admin/penyakit" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
            <h3>{{$gejala}}</h3>
            <p>Data Gejala</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="/admin/gejala" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection