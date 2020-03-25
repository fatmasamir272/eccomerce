@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('/news/'.$country->id),'method'=>'put' ]) !!}
    <div class="form-group">
      {!! Form::label('title',trans('admin.title')) !!}
      {!! Form::text('title',$country->title,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('desc',trans('admin.desc')) !!}
      {!! Form::text('desc',$country->desc,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('content',trans('admin.content')) !!}
      {!! Form::text('content',$country->content,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('status',trans('admin.status')) !!}
      {!! Form::text('status',$country->status,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('user_id',trans('admin.user_id')) !!}
      {!! Form::select('user_id',App\Admin::pluck('id','id'),$country->user_id,['class'=>'form-control']) !!}
    </div>

    {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection