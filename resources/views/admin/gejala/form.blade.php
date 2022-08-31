@extends('template')
@section('konten')
  <section class="content">
    <div class="container-fluid" >
      @if(Session::has('status'))
    <div class="alert alert-danger">
       {{Session::get('status')}}
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
    <section class="content" >
      <div class="container-fluid">
        <div class="row" >
          <div class="col-12" >
            <div class="card" style="background: url({{asset('/image/hasil2.png')}});">
              <div class="card-header" >
                <h3 class="card-title" >{{ $mode === 'edit' ? 'Edit' : 'Tambah'}} Gejala</h3>
              </div>
              <!-- /.card-header -->
              <form action="/admin/gejala/{{ $mode === 'edit' ? 'edit/' . $id : 'tambah' }}" method="post" >
                @csrf
                {{ $mode === 'edit' ? method_field('PUT') : '' }}
                <div class="card-body" >
                  <div class="col-md-6">
                    <div class="form-group" >
                      <label for="exampleInputEmail1" >Gejala</label>
                      <input type="text" class="form-control" placeholder="Gejala" name="gejala" value="{{ $mode === 'edit' ? $gejala : '' }}">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn" style="background-color: #7EA6BF;">{{ $mode === 'edit' ? 'Edit' : 'Tambah' }}</button>
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