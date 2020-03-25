@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <hr>
<div class="form-group row mb-0">
 <div class="col-md-8 offset-md-4">
    <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"><i class="fa fa-facebook"></i> Facebook</a>
</div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
