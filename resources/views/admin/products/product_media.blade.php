@push('js')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script type="text/javascript">
			Dropzone.autoDiscover=false;

	$( function() {
		$('#dropzonefileupload').dropzone({
         url:"{{aurl('/upload/image/'.$product->id)}}",
         method:'post',
         paramName:'files[]', //FILE
         uploadMultiple: true, //FALSE
         maxFiles: 15,
         maxFilesize: 2, //MB
         acceptedFiles:'image/*',
         dictDefaultMessage:'ارفق الملفات هنا ',
         params:{
         	_token:'{{csrf_token()}}'
         },
         addRemoveLinks:true,
         removedfile:function(file){
$.ajax({
dataType:'json',
type:'post',
url:"{{aurl('/delete/image')}}",
data:{_token:'{{ csrf_token() }}',id:file.fid}
});
var fmock;
return(fmock=file.previewElement) != null? fmock.parentNode.removeChild(file.previewElement):void 0;
         },
         init:function(){
         @foreach ($product->files()->get() as $file)
            var mock{name:'{{$file->name}}',size:'{{$file->size}}',type:'{{$file->mime_type}}'};
             this.emit('addedfile',mock);
             this.option.thumbnail.call(this,mock,'{{url("storage/".$file->full_file)}}');
               
            @endforeach 
this.on('sending',function(file,xhr,formData){///we create file.fid here
   formData.append('fid','');
   file.fid='';
});
this.on('success',function(file,response){  ///then we append he id on it
   file.fid=response.id;
});
         }
		});
		/*Dropzone.options.myoption={

		}*/
	});
   //////////////////////////////////////
   $( function() {
       $('#mainphoto').dropzone({
         url:"{{aurl('/update/image/'.$product->id)}}",
         method:'post',
         paramName:'file', //FILE
         uploadMultiple: true, //FALSE
         maxFiles: 1,
         maxFilesize: 2, //MB
         acceptedFiles:'image/*',
         dictDefaultMessage:'ارفق الملفات هنا ',
         params:{
            _token:'{{csrf_token()}}'
         },
         addRemoveLinks:true,
         removedfile:function(file){
$.ajax({
dataType:'json',
type:'post',
url:"{{aurl('/delete/product/image/'.$product->id)}}",
data:{_token:'{{ csrf_token() }}'}
});
var fmock;
return(fmock=file.previewElement) != null? fmock.parentNode.removeChild(file.previewElement):void 0;
         },
         init:function(){
            @if (!empty($product->photo))

            var mock{name:'{{$product->title}}',size:'',type:''};
             this.emit('addedfile',mock);
             this.option.thumbnail.call(this,mock,'{{url("storage/".$product->photo)}}');
            @endif
             this.on('sending',function(file,xhr,formData){///we create file.fid here
            formData.append('fid','');
            file.fid='';
             });
              this.on('success',function(file,response){  ///then we append he id on it
            file.fid=response.id;
             });
                     }
                     });
      
   });
</script>
@endpush

<div id="product_media" class="tab-pane fade in">
	      <h3>{{ trans('admin.product_media') }}</h3>
         <hr/>
         <center><h1>main photo</h1></center>
<div class="dropzone" id="mainphoto"></div>
<hr/>
<div class="dropzone" id="dropzonefileupload"></div>
    </div>
