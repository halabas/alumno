<x-app-layout>


        @if(session()->has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Error</span> {{session()->get('error')}}
        </div>
        @endif

        <x-primary-button><a href="{{route('notas.create')}}">Crear nueva nota</a></x-primary-button>
    </div>

    </x-app-layout>
