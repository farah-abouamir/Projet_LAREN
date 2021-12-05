@extends('master')
@push('styles')
    <link type="text/css"  href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush
@section('content')

<div class="list">
  <h1>Liste des utilisateurs</h1>  
   
<div class="d-flex justify-content-end mb-4">  
    <a class="button"  style= "background-color: #f19520;" href="{{ route('users.create') }}"><i class="fa fa-plus"></i>Ajouter</a>
</div>

<table class="table table-hover  table-bordered  col-md-12 " >
  <thead  style="background-color: #BDC7E3">
    <tr>
      <th scope="col" style="width: 8%">Id</th>
      <th scope="col" style="width: 15%">Nom</th>
      <th scope="col" style="width: 15%">Qualité</th>
      <th scope="col" style="width: 15%">Email</th>
      <th scope="col" style="width: 15%"> <a href="{{ route('roles.index') }}" >Role</a></th>
      <th scope="col" style="width: 30%">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->job}}</td>
        <td>{{$user->email}}</td>
        <td>
        @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
            <span class="badge bg-info">{{ $v }}</span>

            @endforeach
       @endif    
      
       </td>
    <td>
    <form action="{{ route('users.destroy',$user->id) }}" method="POST">   
    <a class="button btn-info" href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye"></i></a>    
    <a class="button btn-primary" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-edit"></i></a>   
    @csrf
    @method('DELETE')      
    <button type="submit" class="button btn btn-danger"><i class="fa fa-trash"></i></button>      
   </form>
    </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $users -> links()}}
</div>


@endsection