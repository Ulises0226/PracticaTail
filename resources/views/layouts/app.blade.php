<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('titulo')</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>


</head>
<body class="bg-gray-100">
<header class="p-5 border-b bg-white shadow">
  <div class="container mx-auto flex justify-between p-2">
     <h1 class="text-3xl font-black">
        Laravel con Tailwind
     </h1>
     @auth
        <nav class="flex gap-2 items-center">
           <!-- Profile dropdown -->
           <div class="relative ml-3">
            <div>
              <a  class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="{{asset('imagenes/login.png')}}" alt="">
              </a>
            </div>

            <!--
              Dropdown menu, show/hide based on menu state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
            <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <!-- Active: "bg-gray-100", Not Active: "" -->
              <a class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">{{auth()->user()->email}}</a>
              <a class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">
              <form method="POST" action="{{'logout'}}">
                @csrf
                  <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
                    Cerrar Sesion
                  </button>
              </form>
              </a>
            </div>
        </nav>
     @endauth
        
     @guest
        <nav class="flex gap-2 items-center">
          <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('index') }}">
            Login
          </a>
          <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('crear-cuenta') }}">
            Crear Cuenta
        </a>
        </nav>
     @endguest
          
     
     
  </div>
</header>
  @yield('contenido')
  @stack('scripts')
 
</body>
</html>