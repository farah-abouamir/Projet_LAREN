
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
<h1>Modifier</h1>
<form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">

@csrf
@method('PUT')
    <div class="inner-wrap">
      <label>Nom<input type="text" name="name" value="{{$user->name}}" ></label>
      <label>Qualité<input type="text"  name="job" value="{{ $user->job }}" ></label> 
      <label>Email<input type="text"  name="email" value="{{ $user->email}}" ></label>  
      <label>Mot de passe<input type="password" name="password" value="{{ $user->password }}" ></label> 
      <label>Confirmer le mot de passe<input type="password"   name="confirm-password" value="{{ $user->password }}" ></label> 
      @role('Admin')
      <label>Role<select id="roles" name="roles" class="select">
        @foreach ($roles as $role)
            <option value={{ $role }}>{{ $role }}</option>
        @endforeach
        </select></label>
        <input type="submit" name="send" value="Modifier" />
   
      @else
      <label>Role<select id="roles" name="roles" class="select">
        @foreach($user->getRoleNames() as $v)
                    <option value={{ $v }}> {{ $v }}</option>
                @endforeach
     </select></label>
     <input type="submit" name="send" value="Modifier" />
   
     <a class="button"  href="{{ route('users.show',$user->id) }}" >Retour</a>
      @endrole          
      </div>
    
    
</form>
</div>

@endsection

