@extends('master')
@push('styles')
    <link type="text/css"  href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush
@section('content')

<div class="list">
  <h1>Les roles</h1>  
   


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-hover  table-bordered  col-md-12 " >
  <thead  style="background-color: #BDC7E3">
    <tr>
      <th scope="col" style="width: 10%">Numero</th>
      <th scope="col" style="width: 25%">Nom</th>
      <th scope="col" style="width: 10%">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($roles as $key => $role)
    <tr>   
  <td>{{ ++$i }}</td>
  <td>{{ $role->name }}</td>
  <td>
  <a class="button btn-info" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye"></i></a>    
  
  </td>
    </tr>
    @endforeach
</tbody>
</table>
{!! $roles->render() !!}
</div>


@endsection