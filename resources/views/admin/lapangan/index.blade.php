@extends('layouts.dashboard')
@section ('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Lapangan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <a href="/dashboard/lapangan/create" class="btn btn-primary mb-2" role="button">Tambah Lapangan +</a>

          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>File Foto</th>
                    <th>Foto</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($lapangan_array as $lapangan)
                  <tr>
                    <td>{{$lapangan->id}}</td>
                    <td>{{$lapangan->nama}}</td>
                    <td>{{$lapangan->file_foto}}</td>
                    <td>
                        @if ($lapangan->file_foto && Storage::disk('public')->exists('file_foto/' . $lapangan->file_foto))
                            <img style="width:200px;" src="{{ asset('storage/file_foto/'.$lapangan->file_foto) }}" alt="{{ $lapangan->nama }}">
                        @else
                            <p>Foto tidak tersedia</p>
                        @endif
                    </td>

                    <td>
                      <a href="/dashboard/lapangan/{{$lapangan->id}}/edit" class="btn btn-info mb-2" role="button">Edit</a>
                      <form action="/dashboard/lapangan/{{ $lapangan->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Are you sure you want to delete this item?');">
                          Delete
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection