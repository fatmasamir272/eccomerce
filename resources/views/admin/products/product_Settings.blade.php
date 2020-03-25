@push('js')
<script type="text/javascript">
	$( function() {
    $( ".datepicker" ).datepicker({
    	rtl:true, 
    	format:'YY-mm-dd',
    	//language:'ar',
    	autoClose:false,
    	todayBtn:true,
    	clearBtn:true,
    });
  } );

	$(document).on('change','.status',function(){
var status=$('.status option:selected').val();
if(status=='refused'){
//$('.reason').show();
$('.reason').removeClass('hidden');

}else{
	$('.reason').addClass('hidden');

}
	});  


</script>
@endpush
<style type="text/css">
	.hidden{visibility: hidden;}
    .show{visibility: visible;}

</style>
<div id="product_Settings" class="tab-pane fade in">
	      <h3>{{ trans('admin.product_Settings') }}</h3>
  <div class="form-group">
      {!! Form::label('price',trans('admin.price')) !!}
      {!! Form::text('price',$product->price,['class'=>'form-control']) !!}
    </div>
      <div class="form-group">
      {!! Form::label('stock',trans('admin.stock')) !!}
      {!! Form::text('stock',$product->stock,['class'=>'form-control']) !!}
    </div>
      <div class="form-group col-md-6 col-lg-6">
      {!! Form::label('start_at',trans('admin.start_at')) !!}
      {!! Form::text('start_at',$product->start_at,['class'=>'form-control datepicker','placeholder'=>'يبدأ فى ']) !!}
    </div>
     <div class="form-group col-md-6 col-lg-6">
      {!! Form::label('end_at',trans('admin.end_at')) !!}
      {!! Form::text('end_at',$product->end_at,['class'=>'form-control datepicker']) !!}
    </div>
    <div class="clearfix"></div>
      <div class="form-group ">
      {!! Form::label('price_offer',trans('admin.price_offer')) !!}
      {!! Form::text('price_offer',$product->price_offer,['class'=>'form-control']) !!}
    </div>
      <div class="form-group col-md-6 col-lg-6">
      {!! Form::label('start_offer_at',trans('admin.start_offer_at')) !!}
      {!! Form::text('start_offer_at',$product->start_offer_at,['class'=>'form-control datepicker']) !!}
    </div>
     <div class="form-group col-md-6 col-lg-6">
      {!! Form::label('end_offer_at',trans('admin.end_offer_at')) !!}
      {!! Form::text('end_offer_at',$product->end_offer_at,['class'=>'form-control datepicker']) !!}
    </div>
      <div class="form-group">
        {!! Form::label('status',trans('admin.status')) !!}
        {!! Form::select('status',['pending'=>'pending','refused'=>'refused','active'=>'active'],$product->status,['class'=>'form-control status']) !!}
     </div>
      <div class="form-group reason {{$product->status!=='refused'?'hidden':'show'}}">
      {!! Form::label('reason',trans('admin.reason')) !!}
      {!! Form::textarea('reason',$product->reason,['class'=>'form-control ']) !!}
    </div>
    </div>
