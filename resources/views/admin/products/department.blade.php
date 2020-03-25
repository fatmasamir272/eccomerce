@push('js')
<!-- Trigger the modal with a button -->
<script type="text/javascript">
$(document).ready(function(){

  $('#jstree').jstree({
    "core" : {
      'data' : {!! load_dep($product->department_id) !!},
      "themes" : {
        "variant" : "large"
      }
    },
    "checkbox" : {
      "keep_selected_style" : true
    },
    "plugins" : [ "wholerow" ]// or checkbox
  });

});
 $('#jstree').on('changed.jstree',function(e,data){
    var i , j , r = [];
    var  name = [];
    for(i=0,j = data.selected.length;i < j;i++)
    {
        r.push(data.instance.get_node(data.selected[i]).id);
        name.push(data.instance.get_node(data.selected[i]).text);
    }
    $('.department_id').val(r.join(', '));
    var department_id=r.join(', ');
   $.ajax({
url:"{{aurl('/load/weight/size')}}",
dataType:'html',
type:'post',
data:{_token:'{{csrf_token()}}',dep_id:department_id},
success:function(data){
  $('.size_weight').html(data);
    $('.info_data').removeClass('hidden');

}
   });
});

</script>
@endpush
<!-- /.box -->
<div id="department" class="tab-pane fade in">
 <h3>{{ trans('admin.department') }}</h3>
<div id="jstree"></div>
<input type="hidden" name="department_id" value="{{$product->department_id}}" class="department_id" >
    </div>
