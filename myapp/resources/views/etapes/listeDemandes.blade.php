@extends('master')
@push('styles')
    <link type="text/css"  href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="list">
  <h1>Liste des demandes</h1>
 
<table class="table table-hover  table-bordered  col-md-12 " >
  <thead style="background-color: #BDC7E3" >
    <tr>
      <th scope="col" style="width: 10%">Numero</th>
      <th scope="col" style="width: 20%">Nom du responsable</th>
      <th scope="col" style="width: 20%">Nom de l'entité</th>
      <th scope="col" style="width: 20%">Nom du produit</th>
      <th scope="col" style="width: 30%">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($demandes as $demande)  
  <tr>
      <th scope="row">{{$demande->id}}</th>
      <td>
        {{ $demande->users->name }}
    </td>
      <td>{{$demande->nom}}</td>
       <td>{{$demande->nomProd}}</td>
       <td>
       <a href="/details/{{$demande->id}}/{{$demande->etape}}"class="button btn-info"><i class="fa fa-eye"></i></a>
       <!-- <a href="/editForm/{{$demande->id}}" class="button btn-primary" ><i class="fa fa-edit"></i></a> -->
       <a href="/affectCommission/{{$demande->id}}" class="button">affecter commission</a>
       @yield('contenu')

      </td> 
</tr>

    @endforeach
  </tbody>
</table>
</div>
@stop