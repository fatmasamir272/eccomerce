@extends('admin.index')
@section('content')


<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('/news')]) !!}
     <div class="form-group">
        {!! Form::label('title',trans('admin.title')) !!}
        {!! Form::text('title',old('title'),['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('desc',trans('admin.desc')) !!}
        {!! Form::text('desc',old('desc'),['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('content',trans('admin.content')) !!}
        {!! Form::text('content',old('content'),['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('status',trans('admin.status')) !!}
        {!! Form::text('status',old('status'),['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('user_id',trans('admin.user_id')) !!}
        {!! Form::select('user_id',App\Admin::pluck('id','id'),old('user_id'),['class'=>'form-control','placeholder'=>'.............']) !!}
     </div>

     {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection