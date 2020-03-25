@extends('admin.index')
@section('content')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
});

</script>
@endpush
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Create product</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('/products'),'files'=>true]) !!}
    <a href="#" class="btn btn-primary save">{{ trans('admin.save') }} <i class="fa fa-file"></i></a>
    <a href="#" class="btn btn-success save_continue">{{ trans('admin.save_continue') }} <i class="fa fa-file"></i></a>
    <a href="#" class="btn btn-info copy_product">{{ trans('admin.copy_product') }} <i class="fa fa-copy"></i></a>
    <a href="#" class="btn btn-danger delete">{{ trans('admin.delete') }} <i class="fa fa-trash"></i></a>

    <div class="container">
  <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#product_info">{{ trans('admin.product_info') }}</a></li>
  <li><a data-toggle="tab" href="#department">{{ trans('admin.department') }}</a></li>
    <li><a data-toggle="tab" href="#product_Settings">{{ trans('admin.product_Settings') }}</a></li>
    <li><a data-toggle="tab" href="#product_media">{{ trans('admin.product_media') }}</a></li>
    <li><a data-toggle="tab" href="#product_size_weight">{{ trans('admin.product_size_weight') }}</a></li>
    <li><a data-toggle="tab" href="#product_other_data">{{ trans('admin.product_other_data') }}</a></li>

  </ul>
     <div class="tab-content">
     @include('admin.products.product_info')
     @include('admin.products.department')
     @include('admin.products.product_Settings')
     @include('admin.products.product_media')
     @include('admin.products.product_size_weight')
     @include('admin.products.product_other_data')
  </div>
</div>
 <a href="#" class="btn btn-primary save">{{ trans('admin.save') }} <i class="fa fa-file"></i></a>
    <a href="#" class="btn btn-success save_continue">{{ trans('admin.save_continue') }} <i class="fa fa-file"></i></a>
    <a href="#" class="btn btn-info copy_product">{{ trans('admin.copy_product') }} <i class="fa fa-copy"></i></a>
    <a href="#" class="btn btn-danger delete">{{ trans('admin.delete') }} <i class="fa fa-trash"></i></a>
    
    
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection
