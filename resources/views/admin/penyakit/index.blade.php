@extends('template')
@section('konten')
  <section class="content">
    <div class="container-fluid">
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Penyakit</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <a href="penyakit/tambah" class="btn btn-success mb-1">Tambah Penyakit Baru</a>
                  @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('status') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Penyakit</th>
                        <th>Solusi</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      @foreach ($penyakit as $key)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $key->penyakit }}</td>
                          <td>{{ $key->solusi }}</td>
                          <td>
                            <a class="btn btn-primary" href="/admin/penyakit/edit/{{ $key->id }}">Edit</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{ $key->id }}">
                              Hapus
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="hapus{{ $key->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Anda yakin akan menghapus data penyakit dengan nama {{ $key->penyakit }}?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="/admin/penyakit/hapus/{{ $key->id }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger" type="submit">Hapus</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
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