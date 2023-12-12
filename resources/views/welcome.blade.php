<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>Document</title>
</head>

<body class="h-screen">
    <div class="bg-gray-600 h-full flex justify-center items-center">
        <form action="{{ route('usuario.register') }}" method="POST"
            class="flex flex-col w-2/4 bg-white p-10 rounded-lg">
            @csrf
            <label>Nombre</label>
            <input class="border-gray-600 border-2 mb-5" type="text" name="name">
            @error('name')
                {{ $message }} <br>
            @enderror
            <label>Fecha de nacimiento</label>
            <input class="border-gray-600 border-2 mb-5" type="date" name="fechaNacimiento">
            @error('fechaNacimiento')
                {{ $message }} <br>
            @enderror
            <label>Documento de identidad</label>
            <input class="border-gray-600 border-2 mb-5" type="text" name="documento">
            @error('documento')
                {{ $message }} <br>
            @enderror
            <label>Ciudad</label>
            <input class="border-gray-600 border-2 mb-5" name="ciudad" id="ciudad" list="Ciudades" type="text">
            @error('ciudad')
                {{ $message }} <br>
            @enderror
            <input type="hidden" id="ciudad_id" name="ciudad_id">

            <datalist id="Ciudades">
                @foreach ($ciudades as $ciudad)
                    <option data-id="{{ $ciudad->id }}" value="{{ $ciudad->descripcion }}">
                @endforeach
            </datalist>

            <button class="bg-gray-600 border-gray-600 border-2 p-3 text-xl" type="submit">Registrar</button>
            <a class="mt-5" href="{{ route('usuario.index') }}">Usuarios</a>
        </form>
    </div>
    <script>
        document.getElementById('ciudad').addEventListener('input', function(e) {
            var input = e.target,
                list = input.getAttribute('list'),
                options = document.querySelectorAll('#' + list + ' option'),
                hiddenInput = document.getElementById(input.id + '_id'),
                inputValue = input.value;

            hiddenInput.value = inputValue;

            for (var i = 0; i < options.length; i++) {
                var option = options[i];

                console.log(option);

                console.log(option.getAttribute('data-id'));
                console.log(option.innerText + " -- " + inputValue);

                if (option.value === inputValue) {
                    hiddenInput.value = option.getAttribute('data-id');
                    break;
                }
            }
        });



        // xhr.send("idPais=" + option.value);
    </script>
</body>

</html>
