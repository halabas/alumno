<x-app-layout>
    <form method="POST" action="{{route('notas.store')}}" class=" mx-auto max-w-2xl">
        @csrf
        <label>Selecciona una asignatura</label>
        <select name="asignatura">
        @foreach ($asignaturas as $asignatura )
        <option value="{{$asignatura->id}}">{{$asignatura->denominacion}}</option>
        @endforeach

        </select><br>

        <label>Selecciona un alumno</label>
        <select name="alumno">
            @foreach ($alumnos as $alumno )
            <option value="{{$alumno->id}}">{{$alumno->nombre}}</option>
            @endforeach
            </select><br>

            <label>Selecciona una nota</label>
            <select name="nota">
                @for ($i=0;$i<11;$i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select><br>

            <label>Inserta el numero del trimestre</label>
        <input type="number" name="trimestre"><br>



        <x-primary-button>Crear nota</x-primary-button>
    </div>
</form>

</x-app-layout>
