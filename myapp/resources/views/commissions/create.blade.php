
@extends('master')
@push('styles')
    <link type="text/css"  href="{{ asset('css/form.css') }}" rel="stylesheet">
@endpush

@section('content')
@if ($errors->any())
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
<h1>Creer une nouvelle commission</h1>
<form  action="{{ route('commissions.store') }}" method="POST" enctype="multipart/form-data">
@csrf

    <div class="inner-wrap">
      <label>Type<input type="text" name="type" placeholder="entrer le type" /></label>
      <label>Matiere<input type="text" name="matière" placeholder="entrer la matière" /></label>
      <label>Niveau<input type="text"  name="niveau_c" placeholder="entrer le niveau" /></label>  
      @foreach ($users as $user)
      <label for=""><input type="checkbox" name="users[]" value="{{$user->id}}">  {{$user->job}} : {{$user->name}}</label>     
      @endforeach
      </div>
     <input type="submit" name="send" value="Envoyer" />
     <a class="button"  href="{{ route('commissions.index') }}" >Toutes les commissions</a>

</form>
</div>
@endsection



