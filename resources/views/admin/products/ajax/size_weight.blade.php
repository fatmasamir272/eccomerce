      <div class="form-group">
        {!! Form::label('sizes',trans('admin.size_id')) !!}
        {!! Form::select('size_id',$sizes,'',['class'=>'form-control','placeholder'=>'choose']) !!}
     </div>
   <div class="form-group">
        {!! Form::label('sizes',trans('admin.size')) !!}
        {!! Form::text('size','',['class'=>'form-control','placeholder'=>'choose']) !!}
     </div>

   <div class="form-group">
        {!! Form::label('weights',trans('admin.weight_id')) !!}
        {!! Form::select('weight_id',$weights,'',['class'=>'form-control',
        'placeholder'=>'choose']) !!}
     </div>
   <div class="form-group">
        {!! Form::label('weights',trans('admin.weight')) !!}
        {!! Form::text('weight','',['class'=>'form-control','placeholder'=>'choose']) !!}
     </div>
  