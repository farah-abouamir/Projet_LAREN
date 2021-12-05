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
        <div class="lien">
        <a href="/files/guides/{{$demande->filePath}}"   target="_blank">Guide d'utilisation</a> <br>
        <a href="{{$demande->lien}}" target="_blank">Lien</a> <br>
        <a href="/files/demandes/{{$demande->filePath}}" target="_blank">Demande de condidature</a> 
     
        </div>
</div>
<div class="button-section">
<a href="/valider/{{$demande->id}}">Valider</a>   
<a href="/rejeter/{{$demande->id}}">Rejeter</a>   
    </div>
</div>


@stop