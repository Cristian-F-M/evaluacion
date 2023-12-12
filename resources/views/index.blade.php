<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite(['resources/css/app.css']) --}}
    <title>Document</title>
</head>

<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha Nacimiento</th>
                    <th>Documento</th>
                    <th>Ciudad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <form action="{{ route('usuario.update', $usuario->id) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <td><input type="text" name="name" value="{{ $usuario->name }}"></td>
                            <td><input type="text" name="fechaNacimiento" value="{{ $usuario->fechaNacimiento }}"></td>
                            <td><input type="text" name="documento" value="{{ $usuario->documentoIdentidad }}"></td>
                            <td><input type="text" name="ciudad_id" value="{{ $usuario->ciudad }}"></td>
                            <td>
                                <button>Editar</button>
                            </td>
                        </form>

                        <td>
                            <form action="{{ route('usuario.delete', $usuario->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button>Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a class="mt-5" href="{{ route('home') }}">Registrar</a>

</body>

</html>
