@extends('style.index')
@section('content')
<div class="alert alert-danger text-center" >
{!! setting()->message_maintenance !!}
</div>
 @endsection

