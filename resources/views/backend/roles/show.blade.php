@extends('backend.layouts.master')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Role</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h1>Name:</h1>
                    <span class="badge badge-info badge-lg" style="font-size: 50px;">{{ $role->name }}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permissions:</strong><br>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            <label class="label label-success"><i class="fa fa-edit"></i>{{ $v->name }},</label><br>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection