@extends('backend.layouts.master')

@section('content')



    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Create New Role</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            
            
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{route('roles.store')}}" method="POST">
                @csrf
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                
                    
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                            @endforeach
                        </div>
                
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
         
        </div>
    </div>
      

    
@endsection