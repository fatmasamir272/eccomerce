@extends('admin.index')
@section('content')


<div class="box">
  <div class="box-header">
    <h3 class="box-title">Edit user</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('/users/'.$admin->id),'method'=>'put' ]) !!}
     <div class="form-group">
        {!! Form::label('name',trans('admin.name')) !!}
        {!! Form::text('name',$admin->name,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('email',trans('admin.email')) !!}
        {!! Form::email('email',$admin->email,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('password',trans('admin.password')) !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
     </div>
        <div class="form-group">
        {!! Form::label('level',trans('admin.level')) !!}
        {!! Form::select('level',['user'=>trans('admin.user'),'vendor'=>trans('admin.vendor'),'company'=>trans('admin.company')],$admin->level,['class'=>'form-control','placeholder'=>'.............']) !!}
     </div>
     {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection