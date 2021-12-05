@extends('master')

@push('styles')
    <link type="text/css"  href="{{ asset('css/suivi.css') }}" rel="stylesheet">
@endpush
@section('content')


@if($demande->status == 0 && $demande->etape == 1)
<div class="steps">
<ul class="stepProg">
    <li class="step1 stepProg_act" >Verification de la condidature</li>
    <li class="step2">Test technique</li>
    <li class="step3">Test pédagogique</li>
    <li class="step4">Label</li>
</ul></div>  
  @endif
  @if( $demande->status == 1 && $demande->etape == 0)
 <!--  etape 1 echoué -->
 <div class="steps">
 <ul class="stepProg">
    <li class="step1 stepProg_failed" >Verification de la condidature</li>
    <li class="step2">Test technique</li>
    <li class="step3" >Test pédagogique</li>
    <li class="step4" >Label</li></ul></div>>
    <div class="failed-section">
      <h2>Votre demande est rejetée</h2>
       <h6> Veuiilez redeposer votre cindidature<h6>
      
      <div class="containerButton">
    <a href="/deposer" class="button">Deposer</a>
    <a href="/files/rapports/{{$demande->rapport}}" class="button">Telecharger le rapport</a></div>
    </div>
  @endif

  @if($demande->status == 0 && $demande->etape == 2)
  <div class="steps">
  <ul class="stepProg">
    <li class="step1 stepProg_complete">Verification de la condidature</li> 
    <li class="step2 stepProg_act" >Test technique</li>
    <li class="step3" >Test pédagogique</li>
    <li class="step4" >Label</li>
  </ul></div>
  
  @endif
  
 @if($demande->status == 1 && $demande->etape == 1)
   <!-- etape2 echoué -->
   <div class="steps">
    <ul class="stepProg">
    <li class="step1 stepProg_complete">Verification de la condidature</li>
    <li class="step2 stepProg_failed">Test technique </li>
    <li class="step3">Test pédaogogique </li>
    <li class="step4">Label</li>
</ul></div>
<div class="failed-section">
      <h2>Votre demande est rejetée</h2>
      <div class="containerButton">
    <a href="/edit/{{$demande->id}}"  class="button">Modifier</a>
    <a href="/files/rapports/{{$demande->rapport}}" class="button">Telecharger le rapport</a></div>
    </div>
  @endif 
  @if($demande->status == 0 && $demande->etape == 3)
  <div class="steps">
  <ul class="stepProg">
    <li class="step1 stepProg_complete">Verification de la condidature</li>
    <li class="step2 stepProg_complete">Test technique</li>
    <li class="step3 stepProg_act" >Test pédagogique </li>
    <li class="step4" >Label</li>
</ul></div>
  @endif 
  @if($demande->status == 1 && $demande->etape == 2)
      <!-- etape 3 echoué -->
    <div class="steps">  
    <ul class="stepProg">
    <li class="step1 stepProg_complete" >Verification de la condidature</li>
    <li class="step2 stepProg_complete" >Test technique</li>
    <li class="step3 stepProg_failed" >Test pédagogique </li>
    <li class="step4" >Label</li>
</ul></div>
<div class="failed-section">
      <h2>Votre demande est rejetée</h2>
      <div class="containerButton">
    <a href="/edit/{{$demande->id}}"  class="button">Modifier</a>
    <a href="/files/rapports/{{$demande->rapport}}" class="button">Telecharger le rapport</a></div>
    </div> 
  @endif 
  @if($demande->status == 0 && $demande->etape == 4)
  <div class="steps">
  <ul class="stepProg">
    <li class="step1 stepProg_complete" >Verification de la condidature</li>
    <li class="step2 stepProg_complete" >Test technique</li>
    <li class="step3 stepProg_complete"  >Test pédagogique</li>
    <li class="step4 stepProg_complete">Label</li>
</ul></div> 
<div class="failed-section">
      <h2>Votre demande a été labellisée</h2>
      <div class="containerButton">
    <a href="/qrcode/{{$demande->id}}"  class="button">Obtenir label</a></div>
  </div>
  @endif 

<br>
<br>
@stop