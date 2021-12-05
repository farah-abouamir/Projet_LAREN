@extends('master')

@push('styles')
    <link type="text/css"  href="{{ asset('css/details.css') }}" rel="stylesheet">
@endpush
@section('content')



<div class="form-style">

<h1>Details de la condidature</h1>
<div class="section">Informations de responsable</div>
<div class="inner-wrap">

<label>Nom : {{$demande->users->name}}</label> 
<label>Email: {{$demande->users->email}}</label>   
<label>Qualité: {{$demande->users->job}}</label>  
</div>
    <div class="section">Informations d'entité</div>
    <div class="inner-wrap">
   
      <label>Numéro : {{$demande->id}}</label> 
      <label>Nom : {{$demande->nom}}</label> 
      <label>Adresse : {{$demande->adresse}}</label>   
      <label>Email: {{$demande->email}}</label>  
    </div>

    <div class="section">Informations du ressource numérique</div>
    <div class="inner-wrap">
        
        <label>Nom du produit : {{$demande->nomProd}}</label>
        <label>Matiére : {{$demande->matiere}} </label>
        <label>Niveau : {{$demande->niveau}}</label>
        <label>Type : {{$demande->type}} </label>
        <label>les commissions affectées :</label>
        @foreach ($commissions as $commission)
        
        @foreach ($commission->demandes as $item)
            @if($item->id==$demande->id)
            <label>->{{$commission->type}}{{$commission->id}}</label>
        <label></label>
        @endif
        @endforeach
        
        @endforeach
        
        
        <div class="lien">
        <a href="/files/guides/{{$demande->filePath}}"   target="_blank">Guide d'utilisation</a> <br>
        <a href="{{$demande->lien}}" target="_blank">Lien</a> <br>
        <a href="/files/demandes/{{$demande->filePath}}" target="_blank">Demande de condidature</a> <br> 
        <a href="/files/rapports/{{$demande->rapport}}" target="_blank">Rapport de la commission</a>  
        
        </div>
</div>
<div class="button-section">
@role('Admin')
<a href="/affectCommission/{{$demande->id}}" class="button">affecter commission</a>
<a href="/valider/{{$demande->id}}">Valider</a>   
<a href="/rejeter/{{$demande->id}}">Rejeter</a>
@endrole
@role('commission')
<a href="/depot_rapport/{id}" class="button">deposer le rapport d'évaluation</a>
@endrole 
  
    </div>
</div>


@stop