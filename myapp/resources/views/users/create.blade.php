
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
<h1>Creer un nouveau utilisateur</h1>
<form  action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
@csrf

    <div class="inner-wrap">
      <label>Nom<input type="text" name="name" placeholder="entrer le nom" /></label>
      <label>Qualité<input type="text"  name="job" placeholder="entrer la qualité" /></label>  
      <label>Email<input type="text"  name="email" placeholder="entrer l'email" ></label>  
      <label>Mot de passe<input type="password" name="password" placeholder="Mot de passe" ></label> 
      <label>Confirmer le mot de passe<input type="password"   name="confirm-password" placeholder="Confirmer mot de passe"></label> 
    
      <select id="roles" name="roles" class="form-control">
                    @foreach ($roles as $role)
                        <option value={{ $role }}>{{ $role }}</option>
                    @endforeach
     </select><br>
     <label><input type="checkbox" > Check me out</label>
      </div>
     <input type="submit" name="send" value="Enregistrer" />
     <a class="button"  href="{{ route('users.index') }}" >Retour</a>

</form>
</div>
@endsection