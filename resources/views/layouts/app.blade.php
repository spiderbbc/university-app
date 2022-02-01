<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      <!-- Theme -->
      <link rel="stylesheet" href="https://bootswatch.com/5/lumen/bootstrap.min.css">
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
               <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                     <a class="nav-link active" href="{{route("home")}}">Home
                     <span class="visually-hidden">(current)</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{route("titulacion.index")}}">Titulaciones</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Pricing</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">About</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                     <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                     </div>
                  </li>
               </ul>
               
            </div>
         </div>
      </nav>
      <div id="app">
        {{-- @include('includes.navbar') --}}  
        @yield('content')
      </div>
   </body>
</html>