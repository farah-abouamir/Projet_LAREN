@extends('master')

@push('styles')
    <link type="text/css"  href="{{ asset('css/details.css') }}" rel="stylesheet">
@endpush
@section('content')



<div class="form-style">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif
<h1>Rapport d'évaluation</h1>

        <label>deposer le rapport d'évaluation<input type="file" class="file-input" name="rapport"/>
            @if ($errors->has('rapport'))
            <small class="text-danger"  >{{ $errors->first('rapport') }}</small>
            @endif 
           </label>
           <input  type="submit" class="button" name="send" value="Envoyer" />

</div>



@stop