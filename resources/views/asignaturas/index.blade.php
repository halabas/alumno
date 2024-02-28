<x-app-layout>


        @if(session()->has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Danger alert!</span> {{session()->get('error')}}
        </div>
        @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Denominacion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Numero de asignaturas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Accion
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asignaturas as $asignatura )

                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$asignatura->denominacion}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$asignatura->numero_de_trimestres}}
                    </th>
                    <td class="px-6 py-4">
                        <a href="{{route('asignaturas.edit',$asignatura)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('asignaturas.show',$asignatura)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">show</a>
                    </td>
                    <td class="px-6 py-4">
                        <form method="POST" action="{{route('asignaturas.destroy',$asignatura)}}">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Borrar</a>
                    </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <x-primary-button><a href="{{route('asignaturas.create')}}">Insertar nuevo asignatura</a></x-primary-button>
    </div>

    </x-app-layout>
