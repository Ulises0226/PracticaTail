@extends('layouts.app')
@section('titulo')
    Dashboard
@endsection
@section('contenido')
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
   <section class="container-fluid mx-auto mt-10>
    @if (session('creado'))
    @push('scripts')

     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <script>
           Swal.fire({
                 position: 'top-end',
                 icon: 'success',
                 title: 'Usuario creado correctamente',
                 showConfirmButton: false,
                 timer: 1500
               })
       </script>
     @endpush    
 @endif
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">DASHBOARD </h1>
           
        </div>
   
    <div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Email
                </th>
                <th scope="col" class="py-3 px-6">
                    ID
                </th>
                <th scope="col" class="py-3 px-6">
                    Usuario
                </th>
        </thead>
        <tbody>
        @foreach($user as $dato)
        @if($dato->email === @auth()->user()->email)

        @else
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$dato->name}}
                </th>
                <td class="py-4 px-6">
                {{$dato->id}}
                </td>
                <td class="py-4 px-6">
                {{$dato->email}}
                </td>


                <form action="{{route('post.edit',$dato->id)}}" method="POST">
                @csrf
                <td class="py-4 px-4">
                <button>Editar</button>

                </td>


                </form>
                <form action="{{route('post.delete',$dato->id)}}" method="POST">
                @if(session('mensaje'))
                @push('scripts')
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Usuario Eliminado',
                    showConfirmButton: false,
                    timer: 1500
                 })
                </script>
                @endpush
                @endif
                @method('DELETE')
                @csrf
                <td class="py-4 px-4">
                <button>Eliminar</button>
                </td>
            </form>
            </tr>


            @endif
            @endforeach   
         </tbody>
    </table>
</div>
 </section>
</div>
@endsection