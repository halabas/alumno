<x-app-layout>
    <form method="POST" action="{{route('asignaturas.update',$asignatura)}}" class=" mx-auto max-w-2xl">
        @method('PUT')
        @csrf
        <div class="relative  z-0 w-full mb-5 group">
            <input type="text" value="{{$asignatura->denominacion}}" name="denominacion" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Denominacion asignatura" required />
        </div>
        <div class="relative  z-0 w-full mb-5 group">
            <input type="number" value="{{$asignatura->numero_de_trimestres}}" name="numero_de_trimestres" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Numero de trimestres" required />
        </div>
        <x-primary-button>Editar Alumno</x-primary-button>
    </div>
</form>

</x-app-layout>
