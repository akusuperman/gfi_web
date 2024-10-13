@extends('layouts.dashboard')
@section ('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User</h1>
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
          <a href="/dashboard/AddUser/create" class="btn btn-primary mb-2" role="button">Tambah User +</a>

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>name</th>
                    <th>email</th>
                    <th>no_telp</th>
                    <th>alamat</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($users as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->no_hp}}</td>
                    <td>{{$user->alamat}}</td>
          
                    <td>
                    <a href="/dashboard/AddUser/{{$user->id}}/edit" class="btn btn-info mb-2" role="button">Edit</a>
                   <form action="/dashboard/AddUser/{{ $user->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-info mb-2 btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
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