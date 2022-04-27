@extends('template')
@section('konten')
  <section class="content">
    <div class="container-fluid">
    <section class="content">
      <div class="container-fluid">
        @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $mode === 'edit' ? 'Edit' : 'Tambah'}} Penyakit</h3>
              </div>
              <!-- /.card-header -->
              <form action="/admin/penyakit/{{ $mode === 'edit' ? 'edit/' . $id : 'tambah' }}" method="post">
                @csrf
                {{ $mode === 'edit' ? method_field('PUT') : '' }}
                <div class="card-body">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Penyakit</label>
                      <input type="text" class="form-control" placeholder="Penyakit" name="penyakit" value="{{ $mode === 'edit' ? $penyakit : '' }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Solusi</label>
                      <input type="text" class="form-control" placeholder="Solusi" name="solusi" value="{{ $mode === 'edit' ? $solusi : '' }}">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">{{ $mode === 'edit' ? 'Edit' : 'Tambah' }}</button>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    </div><!-- /.container-fluid -->
  </section>
@endsection