
@extends('master')
@push('styles')
    <link type="text/css"  href="{{ asset('css/form.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="form-style">
    
    
<!-- Success message -->
@if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
@endif

<h1>affecter commission</h1>
<form   method="post" action="{{route('affecter',$demande->id) }}"enctype="multipart/form-data">
@csrf

<div class="form-group">
     
@foreach ($commissions as $commission)

    
    <label for=""><input type="checkbox" name="commissions[]" value="{{$commission->id}}">  {{$commission->id}}-{{$commission->type}}-{{$commission->matière}}</label>     
    
      @endforeach     
     
    
 
  </div>
  <div class="form-group">

    <input type="submit" name="valider" value="Valider" />  
    <a class="button"  href="{{ route('commissions.index') }}" >Toutes les commissions</a>
</div>
</form>
</div>
@endsection