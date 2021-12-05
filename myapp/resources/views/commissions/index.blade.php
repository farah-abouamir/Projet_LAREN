@extends('master')
@push('styles')
    <link type="text/css"  href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush 
@section('content')

<div class="list">
  <h1>Liste des commissions</h1>  
   
<div class="d-flex justify-content-end mb-4">  
    <a class="button"  style= "background-color: #f19520;" href="{{ route('commissions.create') }}"><i class="fa fa-plus"></i>Ajouter</a>
</div>

 
<table class="table table-hover  table-bordered  col-md-12 " >
  <thead  style="background-color: #BDC7E3">
    <tr>
      <th scope="col" style="width: 10%">Id</th>
      <th scope="col" style="width: 15%">Type</th>
      <th scope="col" style="width: 15%">Matiére</th>
      <th scope="col" style="width: 15%">Niveaux</th>
      <th scope="col" style="width: 30%">Membre</th>
      <th scope="col" style="width: 30%">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($commissions as $commission)
            <tr>
                <td>{{ $commission->id }}</td>
                <td>{{ $commission->type }}</td>
                <td>{{ $commission->matière }}</td>
                <td>{{ $commission->niveau_c }}</td>
                <td>
                    <ul>
                    @foreach ($commission->users as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach
                    </ul> 
                </td>
                <td>
                    <form action="{{ route('commissions.destroy',$commission->id) }}" method="get">  
                        <a class="button btn btn-info" href="{{ route('commissions.show',$commission->id)}}"><i class="fa fa-eye"></i></a>
                        <a class="button btn btn-primary" href="{{ route('commissions.edit',$commission->id)}}"><i class="fa fa-edit"></i></a>
                        @csrf
                        
                        @method('DELETE')
                        <button type="submit" class="button btn btn-danger"><i class="fa fa-trash"></i></button>      
                       
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection