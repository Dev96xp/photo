<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    {{-- ReCAPTCHA    Parte[1/4] --}}
    <script src="https://www.google.com/recaptcha/api.js?render=6Ldd3EgsAAAAAPOlYsiXFE0DLiPT6e5PLox45ftx"></script>

    {{-- ReCAPTCHA    Parte[2/4] --}}
        {{-- - Que se mantenga a la escucha de cualquier envió de formulario en la página.
        - Significa esta a la escucha del evento 'submit' en el documento.
        - Cuando se detecta un envió de formulario, se ejecuta la función proporcionada.
        - La función recibe el evento 'e' como parámetro, que contiene información sobre el evento de envió.
        - Dentro de la función, se llama a e.preventDefault() para evitar que el formulario se envíe de la manera tradicional. --}}
    <script>
        document.addEventListener('submit', function(e) {
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('6Ldd3EgsAAAAAPOlYsiXFE0DLiPT6e5PLox45ftx', {    // Clave del sitio
                    action: 'submit'
                }).then(function(token) {       // Se genera un token de reCAPTCHA  (TOKEN es como una contraseña de un solo uso)

                    let form = e.target;    // Recupera el formulario q se intento enviar
                    let input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'g-recaptcha-response';
                    input.value = token;
                    form.appendChild(input);
                    form.submit();
                });
            });
        });
    </script>

</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>

    @livewireScripts

    @stack('js') {{--  Se conecta con el formulario de registro para recaptcha --}}
</body>

</html>
