@extends('master')


@section('content')
<style>
.lien a:link {color:#02658c;}
.lien a:visited {color:#02658c;}
.lien a:hover  {color:#df6a2d;}
</style>


       
    
<div class="form-style">

    <h1>Details de la commission</h1>
    
        <div class="section">Details de la commissions</div>
          <div class="inner-wrap">
    
          <label>Numéro : {{$commission->id}}</label> 
          <label>Matière: {{$commission->type}}</label> 
          <label>Matière: {{$commission->matière}}</label> 
          <label>Niveau : {{$commission->niveau_c}}</label>  
          </div>
          <div class="section">Membres de la commission</div>
        
          <div class="inner-wrap">
          @foreach ($users as $user)
        
            @foreach ($commission->users as $item)   
                @if($item->id==$user->id)
                    <label >Numero : {{$user->id}}</label>
                    <label >Nom    : {{$user->name}}</label>
                    <label >Email  : {{$user->email}}</label>
                    <label >Qualité: {{$user->job}}</label>
                    <br>
                @endif

            @endforeach
           @endforeach  
        </div>
        <div class="button-section">
              
            <a class="button"  href="{{ route('commissions.index') }}" >Toutes les commissions</a>
            
       
           </div>
        </div>
       
</div>
@endsection