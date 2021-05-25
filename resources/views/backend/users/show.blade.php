@extends('backend.layouts.master')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Show User</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <br>
            
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        
                        <span class="badge badge-info" style="font-size: 50px">{{ $user->name }}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Roles:</strong>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection