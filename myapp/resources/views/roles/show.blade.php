@extends('master')
@push('styles')
<link type="text/css"  href="{{ asset('css/form.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="form-style">
<h1>Détail du role</h1>
    <div class="inner-wrap">

    <label>Nom : {{$role->name}}</label> 
    <label>Permissions : 
    @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label>
                @endforeach
            @endif
    </label>  

</div>
<div class="button-section">
     <a class="button" href="{{ route('roles.index') }} " type="button" >Retour</a>   
    </div>
</div>



@endsection