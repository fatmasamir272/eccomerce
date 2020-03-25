 @push('js')
<script type="text/javascript">
$(document).ready(function() {
	var dataSelect = [
				@foreach(App\Model\Country::all() as $country)
				  {
				  	"text":"{{ $country->{'country_name_ar'} }}",
				  	"children":[
				 	@foreach($country->malls()->get() as $mall)
				 	{
				 		"id":{{ $mall->id }},
				 		"text":"{{ $mall->{'name_ar'} }}",
				 		@if(check_mall($mall->id,$product->id))
				 		"selected":true
				 		@endif
				 	},
				 	@endforeach
				 	],
				 },
				 @endforeach
		];
    $('.mall_select2').select2({data:dataSelect});
});
</script>
@endpush
 <div id="product_size_weight" class="tab-pane fade in">
 	      <h3>{{ trans('admin.product_size_weight') }}</h3>
 	      <div class=" size_weight"> 
 	      	<center><h2>من فضلك قم باختيار قسم</h2></center>
    </div>

    <div class="info_data hidden">
    	<div class="form-group">
        {!! Form::label('color_id',trans('admin.color_id')) !!}
        {!! Form::select('color_id',App\Model\Color::pluck('name_ar','id'),$product->color_id,['class'=>'form-control','placeholder'=>'choose']) !!}
     </div>
     <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12">
			{!! Form::label('trade_id',trans('admin.trade_id')) !!}
			{!! Form::select('trade_id',App\Model\TradeMark::pluck('name_ar','id'),$product->trade_id,['class'=>'form-control','placeholder'=>trans('admin.trade_id')]) !!}
		</div>
		<div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12">
			{!! Form::label('manu_id',trans('admin.manu_id')) !!}
			{!! Form::select('manu_id',App\Model\Manufacturers::pluck('name_ar','id'),$product->manu_id,['class'=>'form-control','placeholder'=>trans('admin.manu_id')]) !!}
		</div>
		<div class="form-group col-md-12 col-lg-12 col-sm-12">
			{!! Form::label('malls',trans('admin.malls')) !!}
			<select name="mall[]" class="form-control mall_select2" multiple="multiple" ></select>
		</div>
<div class="clearfix"></div>
    </div>
    </div>
