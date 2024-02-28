<div>
    <select wire:click='notaActual()' wire:model="asignaturaF" name="asignatura_id" id="asignatura_id">
        @foreach($asignaturas as $asignatura)
            <option value="{{$asignatura->id}}">{{$asignatura->denominacion}}</option>
        @endforeach
    </select>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre del alumno
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nota 1er trim.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nota 2º trim.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nota 3º trim.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nota final
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @php

                    @endphp
                    @foreach ($alumnos as $alumno)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$alumno->nombre}}
                            </th>
                            @foreach($alumno->notas->where('asignatura_id',$asignaturaF) as $nota)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$nota->nota}}
                            </th>
                            @endforeach
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$notasF}}
                            </th>
                    @endforeach

                        </tr>
                </tbody>
            </table>
        </div>
</div>
