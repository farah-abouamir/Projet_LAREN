@extends('master')


@section('content')
<style>
.lien a:link {color:#02658c;}
.lien a:visited {color:#02658c;}
.lien a:hover  {color:#df6a2d;}
</style>


       
    
<div class="form-style">

    <h1>Details de la condidature</h1>
    
        <div class="section">Informations personnelles</div>
          <div class="inner-wrap">
    
          <label>Numéro : {{$user->id}}</label> 
          <label>Nom : {{$user->name}}</label> 
          <label>Email: {{$user->email}}</label>   
          <label>Qualité: {{$user->job}}</label>  
       
          
            
            
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label  >Role:{{ $v }}</label>
                @endforeach
            @endif
        </div>
        <div class="button-section">
              
            <a  href="{{ route('users.edit',$user->id) }}" class="button">Modifier le mot de passe</a>
            
            
           </div>
        </div>
       
</div>
@endsection