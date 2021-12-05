@extends('master')

@push('styles')
<link  rel="stylesheet"  href="{{asset('css/style.css')}}">

<link  rel="stylesheet"  href="{{asset('css/home.css')}}">  
@endpush


@section('content')


<body>	
	
		
    
    <div class="container">
      
    <div class="centered">
    <div class="text-block">
         <h1> Processus de labellisation des ressources numériques en ligne</h1>
        <P>Le Laboratoire National des Ressources Numériques « LNRN » a mis en place, dans le cadre de la stratégie nationale de la généralisation des technologies de l'information et de la communication dans l'enseignement « Programme GENIE »,
            <br>une procédure de Labellisation pour l'octroi du Label de Qualité relatif aux Ressources éducatives numériques. Ce processus vise à doter la communauté éducative de ressources numériques de haute qualité éducative respectant les normes techniques les plus reconnues au niveau international, ceci en instaurant un esprit de compétitivité, de créativité, d'innovation, et de distinction entre les producteurs de ressources numériques.
            <br>Il s'agit dans ce sens, d'offrir un service de qualité aux candidats à la Labellisation et d'amener sur la base du volontariat les sociétés à développer une démarche qualitative dans la production de ressources numériques et de créations multimédia.
        </P>
    </div>
        
        <img  src="{{asset('images/RN3.jpg')}}"   />  
        
  </div>        
    </div>
    
   
 

        
</body>

@endsection