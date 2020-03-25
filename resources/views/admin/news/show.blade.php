@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
<div>
	
<p># {{$news->id}}</p>
<p>{{$news->title}}</p>
<p>username {{$news->user->name}}</p>
<p>{{$news->status}}</p>
@foreach($news->comments()->get() as $comment)
<p>Add By : {{$comment->user->name}}</p>
<p>comment : {{$comment->comment}}</p>
<br/>
@endforeach
<!-- /.box-header -->
<center>Add comment</center>
  <div class="box-body">
    {!! Form::open(['url'=>aurl('/news/'.$news->id),'method'=>'post' ]) !!}
     <div class="form-group">
        {!! Form::label('comment',trans('admin.comment')) !!}
        {!! Form::textarea('comment',old('comment'),['class'=>'form-control']) !!}
     </div>
     {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
@endsection