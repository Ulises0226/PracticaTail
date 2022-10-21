@extends('layouts.app')
@section('titulo')
   Crear Cuenta
@endsection
@section('contenido')
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>


<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="p-6 w-full max-w-md space-y-8 shadow-md border border-gray-200 rounded-lg">
      <div>
        <img class="mx-auto h-36 w-auto " src="{{asset('imagenes/registrar.png')}}" alt="Practica con Laravel">
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Crear Cuenta</h2>
        
      </div>
      <form class="mt-8 space-y-6" action="{{route('crear-cuenta')}}" method="POST">
        @csrf
        <input type="hidden" name="remember" value="true">
        <div class="-space-y-px rounded-md shadow-sm">
          <div>
            <label for="name" class="sr-only">Nombre</label>
            <input 
              id="name" 
              name="name" 
              type="text"  
              class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" 
              value="{{old('name')}}" 
              placeholder="Escribe tu usuario"/>
              @error('name')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                     {{$message}}
                </p>
              @enderror
          </div>
          <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input 
              id="email-address" 
              name="email" 
              type="email" 
              autocomplete="email" 
              class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" 
              value="{{old('email')}}" 
              placeholder="Escribe tu correo"/>
              @error('email')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                     {{$message}}
                </p>
              @enderror
          </div>
          <div>
            <label for="password" class="sr-only">Password</label>
            <input 
              id="password" 
              name="password" 
              type="password" 
              autocomplete="current-password" 
              class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" 
              placeholder="Escribe el Password"/>
              @error('password')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                     {{$message}}
                </p>
              @enderror
          </div>
          <div>
            <label for="password_confirmation" class="sr-only">Confirmar Password</label>
            <input 
              id="password_confirmation" 
              name="password_confirmation" 
              type="password" 
              autocomplete="current-password" 
              class="border p-3 w-full rounded-lg" 
              placeholder="Confirmar Password">
          </div>
        </div>
        <div>
          <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <!-- Heroicon name: mini/lock-closed -->
              <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
              </svg>
            </span>
            Registrar
          </button>
        </div>
      </form>
    </div>
  </div>


@endsection