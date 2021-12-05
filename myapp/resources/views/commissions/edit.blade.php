
@extends('master')
@push('styles')
    <link type="text/css"  href="{{ asset('css/form.css') }}" rel="stylesheet">
@endpush

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
<div class="form-style">
<h1> Modifier </h1>
<form action="{{route('commissions.update', $commission->id)}}" method="POST" enctype="multipart/form-data">

@csrf

    <div class="inner-wrap">
      <label>Type<input type="text" name="type" value="{{$commission->type}}" ></label>
      <label>Matiere<input type="text" name="matière" value="{{$commission->matière}}" ></label>
      <label>Niveau<input type="text"  name="niveau_c" value="{{$commission->niveau_c}}"></label>  
      @foreach ($users as $user)
      <input type="checkbox" name="users[]" value="{{$user->id}}"
      @foreach ($commission->users as $item)   
      @if($item->id==$user->id)
       checked
     @endif
      @endforeach>
     <label for="">{{$user->job}}</label>
      @endforeach
                
      </div>
     <input type="submit" name="send" value="Modifier" />
     <a class="button"  href="{{ route('commissions.index') }}" >Retour</a>

</form>
</div>
@endsection



