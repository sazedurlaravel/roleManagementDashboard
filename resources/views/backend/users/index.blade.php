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
          @can('user-list')
          <h3 class="card-title">Users Table</h3>
          @can('user-create')
          <a href="{{route('users.create')}}" class="btn btn-success btn-sm float-right"> <i class="fa fa-user"></i> Create User</a>
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
              <th>Email</th>
              <th>Roles</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$user->name}} </td>
                    <td>{{$user->email}}</td>
                    <td> 
                        @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                           <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                      @endif
                    </td>
                    <td>
                      <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}">Show</a>
                      @can('user-edit')
                      <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">Edit</a>
                      @endcan
                      @can('user-delete')
                       {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
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
                <th>Email</th>
                <th>Roles</th>
                <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      @else 
      <div class="text-center">
         <h2 class="badge badge-warning" style="font-size: 50px;">You do not any permission to see this</h2>
      </div>
     

     @endcan
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