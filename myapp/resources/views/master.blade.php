<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laren</title>
    <link  rel="stylesheet"  href="{{asset('assets/css/bootstrap.min.css')}}">
    <link  rel="stylesheet"  href="{{asset('css/style.css')}}">
    <link  rel="stylesheet"  href="{{asset('css/form.css')}}">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="{{asset('assests/js/jquery.min.js')}}"></script>
    <script src="{{asset('assests/js/boo tstrap.min.js')}}"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    @stack('styles')

</head>
<body>
  
   
<div  class="entete"> 
      <img  src="{{asset('images/MinistreLogo.png')}}"/> 
  
      <div>
        <h1>L@REN</h1>
         <h5 style="color: #02658c">
          <strong>Système de L@bellisation des Ressources Educatives Numériques</strong></h5>
      </div>
      <img class="genie" src="{{asset('images/logo.jpeg')}}"/>

</div>

<nav class="navbar">
        <div class="branding">
          <h2><a href="#" class="branding-logo">LAREN</a></h2>
        </div>
        <label for="input-laren" class="laren "></label>
        <input type="checkbox" id="input-laren" hidden >
        <ul class="menu">
         
          <li><a href="{{ url('/') }}" class="menu-link">Acceuil</a></li>
          <li><a href="{{ url('/instructions') }}" class="menu-link">Documentation</a></li> 
          @role('Admin')
          <li><a href="{{ url('/commissions') }}" class="menu-link">Commissions</a> </li>
        
          <li><a href="{{ route('users.index') }}">Utilisateurs</a></li>
      
      <li class="has-dropdown">
        <a href="#" class="menu-link">Etapes
          <span class="arrow"></span>
        </a>
        <ul class="submenu">
          <li><a href="/show" class="menu-link">La liste des Candidatures</a></li>
          <li><a href="/list/1" class="menu-link">Etape 1</a></li>
          <li><a href="/list/2" class="menu-link">Etape 2</a></li>
          <li><a href="/list/3" class="menu-link">Etape 3</a></li>
        </ul>
      </li>
      @else
       <li>     <a href="/deposer" class="menu-link">Dépot</a></li>
          
      <li><a href="/suivi/{{Auth::id()}}">Suivre la demande</a></li>
     @endrole
     @role('commission')
     <li class="has-dropdown">
      <a href="#" class="menu-link">Etapes
        <span class="arrow"></span>
      </a>
      <ul class="submenu">
       
        <li><a href="/list/2" class="menu-link">Etape 2</a></li>
        <li><a href="/list/3" class="menu-link">Etape 3</a></li>
      </ul>
    </li>
    @endrole
      <li>
      <div class="container" >
        @if (Route::has('login'))
          
            @auth    
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="signup">
              Déconnecter
          </a>
          
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form></li> 
          <li><a  href="{{route('users.show',Auth::id())}}" class="signup">Profil</a></li>  
            @else
             <li><a href="{{ route('login') }}" class="signup">Se connecter</a></li>
            @if (Route::has('register'))
             <li> <a href="{{ route('register') }}" class="signup">S'inscrire</a></li>
            @endif 
            @endauth
        @endif 
        </div>
      </li>
    
      </nav>
      <br>
      <br>
      <br>
     
      
      @yield('content')

   <footer
          class="text-center text-lg-start text-white"
          style="background-color: #02658c"
          >
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
             Programme Génie
            </h6>
            <small>
              Programme de Généralisation des Technolgies  d'Information et de Communication dans l'Enseignement
           </small>
          </div>
          <hr class="w-100 clearfix d-md-none" />
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">A propos de nous</h6>
            <p>
              <a class="text-white">Labelde LAREN</a>
            </p>
            <p>
              <a class="text-white">Comment obtenir le label</a>
            </p>
            <p>
              <a class="text-white">S'inscrire</a>
            </p>
          </div>
  
          <hr class="w-100 clearfix d-md-none" />
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
            Liens utiles 
            </h6>
            <p>
              <a class="text-white" href=" https://www.men.gov.ma">www.men.gov.ma</a>
            </p>
            <p>
              <a class="text-white"  href="https://www.taalimtice.ma">www.taalimtice.ma</a>
            </p>
  
          </div>
          <hr class="w-100 clearfix d-md-none" />
  
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p><i class="fas fa-home mr-3"></i>Avenue de la victoire, Bab Rouah, Rabat 10000, Maroc</p>
            <p><i class="fas fa-envelope mr-3"></i> taalimtice@taalim.ma</p>
            <p><i class="fas fa-phone mr-3"></i> + 212 537 68 72 71</p>
            <p><i class="fas fa-print mr-3"></i> + 212 537 68 72 72</p>
          </div>

        </div>
      </section>
    
    </div>
  </footer>

</body>



</html>