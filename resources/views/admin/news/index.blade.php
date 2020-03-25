@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
  	{!! Form::open(['id'=>'form_data','url'=>aurl('/news/destroy/all'),'method'=>'delete']) !!}
    {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover  table-bordered'],true) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->


<!-- Trigger the modal with a button -->
        <!-- Modal -->
<div class="modal fade" id="multipaleDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete All</h5>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger">
          <div class="not_empty_record hidden"> <h1>Are You Sure You want to delte</h1> 
            <span class="record_count"></span>  </div>
          <div class="empty_record hidden"> <h1>Empty Checked</h1> </div>
      </div>
      </div>
      <div class="modal-footer">
                <div class="empty_record hidden">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <div class="not_empty_record hidden">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="del_all" class="btn btn-primary del_all" value="Delete" > 
                </div>
      </div>
    </div>
  </div>
</div>
@push('js')
   {!! $dataTable->scripts() !!}   
@endpush
@endsection