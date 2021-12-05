
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

<h1>modifier la candidature</h1>
<form   method="post"  action="/editForm/{{$demande->id}}" enctype="multipart/form-data">
@csrf


<input type="number" value="1" name="commission_id" style="display: none"/>
<div class="section">Informations d'entité</div>
    <div class="inner-wrap">
      <label>Nom<input type="text"value="{{ $demande->nom }}" name="nom" />
      @if ($errors->has('nom'))
     <small class="text-danger">{{ $errors->first('nom') }}</small>
      @endif
      </label>
        <label>Adresse<textarea type="text" value="{{ $demande->adresse}}" name="adresse">{{ $demande->adresse}}</textarea>
        @if ($errors->has('adresse'))
        <small class="text-danger">{{ $errors->first('adresse') }}</small>
        @endif
    </label>
        <label>Email<input type="email"  value="{{ $demande->email }}" name="email" />
        @if ($errors->has('email'))
        <small class="text-danger">{{ $errors->first('email') }}</small>
        @endif
        </label>  
    </div>

    <div class="section">Informations du ressource numérique</div>
    <div class="inner-wrap">
        
        <label>Nom du produit<input type="text" value="{{ $demande->nomProd }}" name="nomProd" />
        @if ($errors->has('nomProd'))
        <small class="text-danger"  >{{ $errors->first('nomProd') }}</small>
        @endif   
        </label>
        

       <label>Matiére<select name="matiere" value="{{ $demande->matiere }}" class="select">
        <option value="{{ $demande->matiere }}">{{ $demande->matiere }}</option>
        <option value="Arabe">Arabe</option>
        <option value="Français">Français</option>
        <option value="Amazigh">Amazigh</option>
        <option value="Sciences">Sciences</option>
        </select>
        @if ($errors->has('matiere'))
        <small class="text-danger"  >{{ $errors->first('matiere') }}</small>
        @endif
       </label>

       <label>Niveau<select name="niveau" class="select">
        <option value="">--Choisir une option--</option>    
        <option  {{ ( $demande->niveau)=='Primaire'? 'selected' :'' }}   value="Primaire">Primaire</option>
        <option   {{ ( $demande->niveau)=='Collége'? 'selected' :'' }}  value="Collége">College</option>
        <option  {{ ( $demande->niveau)=='Secondaire'? 'selected' :'' }}  value="Secondaire">Secondaire</option>
        </select>
        @if ($errors->has('niveau'))
        <small class="text-danger"  >{{ $errors->first('niveau') }}</small>
        @endif  
        </label>

        <label>Type<select name="type" class="select">
        <option value="">--Choisir une option--</option>   
        <option {{ ( $demande->type)=='Vidéo'? 'selected' :'' }}  value="Vidéo">Vidéo</option>
        <option  {{ ( $demande->type)=='Quiz'? 'selected' :'' }}  value="Quiz">Quiz</option>
        </select>  
        
        @if ($errors->has('type'))
        <small class="text-danger"  >{{ $errors->first('type') }}</small>
        @endif 
       </label>       
       
 <label>Guide d'utilisation<input type="file" value="{{ $demande->guide}}" class="file-input" name="guide"/>
        @if ($errors->has('guide'))
        <small class="text-danger"  >{{ $errors->first('guide') }}</small>
        @endif 
       </label> 

       
        
        <label>Lien<input type="url" value="{{ $demande->lien }}" name="lien"/>
        @if ($errors->has('lien'))
        <small class="text-danger"  >{{ $errors->first('lien') }}</small>
        @endif
       </label> 

        <label>Demande de condidature<input type="file"  value="{{ $demande->filePath}}" class="file-input" name="filePath"/>
        @if ($errors->has('filePath'))
        <small class="text-danger"  >{{ $errors->first('filePath') }}</small>
        @endif
       </label>    
      

    </div>
   
    <div class="button-section">
     <input type="submit" name="send" value="Envoyer" />
     <input type="reset" name="reset"/>
    </div>
</form>
</div>
@endsection

