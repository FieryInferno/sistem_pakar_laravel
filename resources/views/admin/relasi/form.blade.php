@extends('template')
@section('konten')
    <section class="content">
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card" >
              <div class="card-header" >
                <h3 class="card-title">{{ $mode === 'edit' ? 'Edit' : 'Tambah' }} Diagnosis</h3>
              </div>
              <!-- /.card-header -->
              <form action="/admin/relasi/{{ $mode === 'edit' ? 'edit/' . $id : 'tambah' }}" method="post">
                @csrf
                {{ $mode === 'edit' ? method_field('PUT') : '' }}
                <div class="card-body">
                  <div class="col-md-6" style="background: url({{asset('/image/user2.png')}});">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Penyakit</label>
                      <select name="penyakit_id" id="penyakit" class="form-control">
                        <option disabled selected>Pilih Penyakit</option>
                        <?php
                          foreach ($penyakit as $key) { ?>
                            <option value="<?= $key->id; ?>" {{ $mode === 'edit' ? $key->id === $penyakit_id ? 'selected' : '' : '' }}><?= $key['penyakit']; ?></option>
                          <?php }
                        ?>
                      </select>
                    </div>
                    <!-- <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Gejala</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ($gejalaa as $key) { ?>
                            <tr>
                              <td>
                                <div class='form-check'>
                                  <input class='form-check-input' type='checkbox' value='<?= $key["id_gejala"]; ?>' id='defaultCheck1' name='gejala[]'>
                                </div>
                              </td>
                              <td><?= $key["gejala"]; ?></td>
                            </tr>
                          <?php }
                        ?>
                      </tbody>
                    </table> -->
                    <div class="form-group">
                      <label for="">Daftar Gejala</label>
                      <!-- <table id="datatable_gejala" class="table table-bordered table-striped" width="100%"> -->
                      <table class="table table-bordered table-striped" width="100%">
                        <thead>
                          <tr>
                            <th width="5%">#</th>
                            <th width="95%">Nama Gejala</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($gejalaa as $key) { ?>
                              <tr>
                                <td>
                                  <div class='form-check'>
                                    <input class='form-check-input' type='checkbox' value='<?= $key->id; ?>' id='defaultCheck1' name='gejala[]' <?= $mode === 'edit' ? in_array($key->id, json_decode($gejala)) ? 'checked' : '' : ''; ?>>
                                  </div>
                                </td>
                                <td><?= $key["gejala"]; ?></td>
                              </tr>
                            <?php }
                          ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>#</th>
                            <th>Nama Gejala</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn" style="background-color: #7EA6BF;"  >Tambah</button>
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
@endsection