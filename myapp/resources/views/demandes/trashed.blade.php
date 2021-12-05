@extends('layouts.crud')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">Trashed Posts  </h1>
        <a class="btn btn-success" href="{{route('listeDemandes')}}"> all posts</a>
        <a class="btn btn-danger" href="{{route('demandes.trashed')}}"> Trash <i class="fas fa-trash"></i></a>
           </div>
      </div>
    </div>
    <div class="row">


        @if ($demandes->count() > 0 )
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" style="width: 10%">Numero</th>
                    <th scope="col" style="width: 35%">Nom de l'entité</th>
                    <th scope="col" style="width: 35%">Nom du produit</th>
                    <th scope="col" style="width: 20%">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($demandes as $demande)
                    <tr>
                        <th scope="row">{{$demande->id}}</th>
                        <td>{{$demande->nom}}</td>
                        <td>{{$demande->nomProd}}</td>
                        <td>{{$demande->user->name}}</td>
                        
                        <td>
                            <a  class="text-success" href="#"> <i class="fas fa-2x fa-undo"></i> </a> &nbsp;&nbsp;

                        <a class="text-danger" href="#"> <i class="fas  fa-2x fa-trash-alt"></i> </a>
                        </td>
                      </tr>
                    @endforeach

                </tbody>
              </table>


          </div>
        @else
        <div class="col">
            <div class="alert alert-danger" role="alert">
               Empty trash
              </div>
        </div>

        @endif


    </div>
  </div>
@endsection