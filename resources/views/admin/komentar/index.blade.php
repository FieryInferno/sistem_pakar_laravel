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
                  <h3 class="card-title">Data Komentar</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="background: url({{asset('/image/user2.png')}});">
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
                        <th>Nama</th>
                        <th>Komentar</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      @foreach ($komentar as $key)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $key->nama }}</td>
                          <td>{{ $key->komentar }}</td>
                          <td>
                            <button type="button" class="btn" style="background-color: #ED7075;" data-toggle="modal" data-target="#hapus{{ $key->id }}">
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
                                    Anda yakin akan menghapus data Diagnosis dengan nama {{ $key->komentar }}?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn"  style="background-color: #BBBBBB;" data-dismiss="modal">Close</button>
                                    <form action="/admin/komentar/hapus/{{ $key->id }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn" style="background-color: #ED7075;" type="submit">Hapus</button>
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