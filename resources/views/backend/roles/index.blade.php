@extends('backend.layouts.master')

@section('styles')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">roles Table</h3>
          @can('role-create')
          <a href="{{route('roles.create')}}" class="btn btn-success btn-sm float-right"> <i class="fa fa-role"></i> Create role</a>
          @endcan
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
        @endif
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$role->name}} </td>   
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}">Show</a>
                        @can('role-edit')
                            <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                        @endcan
                        @can('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endcan
                
                    </td>
                    </tr>  
                @endforeach
           
           
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

     
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
@endsection

@section('scripts')

    <!-- DataTables -->
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>


<script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection