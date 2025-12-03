<h1>Notas desde base de datos</h1>

<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
        </tr>
    </thead>

    @foreach ($notas as $nota)
        <tr>
            <td>{{$nota -> nombre}}</td>
            <td>{{$nota -> descripcion}}</td>
        </tr>
    @endforeach
</table>