@extends('adminlte::page')

@section('codersfree', 'Dashboard')

{{-- DESPLIEGA LAS IMAGENES PERTENECIENTES A UN ENTIDAD,
     EN ESTE CASO PARA LOS EXPENSES (GASTOS) --}}
@section('content_header')
    <h1 class="text-sm">Add images </h1>
    {{-- <div>Special notes: {{ $expense->note }}</div> --}}
@stop

{{-- INSTALAR DROPZONE
Parte [1/7] - Copiar links de css en (https://cdnjs.com/libraries/dropzone) y ponerlo aqui --}}
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('content')

    <x-admin-layout>
        <div class="container p-0">

            {{-- Titulo --}}

            <div class="row">
                <div class="col">
                    {{-- DESPLIGA IMAGENES(ticket o factura) UNA VEZ QUE FUERON SUBIDAS PARA ESTE EXPENSES(GASTOS) --}}
                    @livewire('admin.expense.display-gallery', ['expense' => $expense], key($expense->id))

                    {{-- METODO #2 DROPZONE PARA SUBIR VARIAS IMAGENES AL MISMO TIEMPO --}}

                    {{-- Parte [3/7] Formulario - Copiar el formulario que se encargara de mostrar el DROPZONE
                         y ejecutar las de acciones necesarias para el metodo store, de
                     (https://docs.dropzone.dev/getting-started/setup/declarative) --}}

                    <form action="{{ route('admin.expense.save_images', $expense) }}" method="POST" class="dropzone"
                        id="my-awesome-dropzone">
                    </form>

                </div>
            </div>

        </div>
    </x-admin-layout>



@stop

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

    {{-- Parte [2/7] - Copiar links de js en (https://cdnjs.com/libraries/dropzone) y pegar aqui --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

    {{-- Parte [4/7] - Agregar las configuraciones (options) adicionales para el DROPZONE de
                     (https://docs.dropzone.dev/getting-started/setup/declarative) --}}

    {{-- Parte [5/7] - Importante que el nombe del id del formulario sea
                   el mismo que el de las cofiguraciones, con el formato apropiado(camelizado)
                   y listo ya se suben las imagenes --}}

    {{-- Parte [6/7] - Agregar el script para que el livewire se actualice
                     (https://laravel-livewire.com/docs/2.x/lifecycle-hooks) --}}
    <script>
        // Note that the name "myDropzone" is the camelized
        // id of the form.
        Dropzone.options.myAwesomeDropzone = {
            // Configuration options go here
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            dictDefaultMessage: "Arrastre una imagen al recuadro", // 2. Mensaje por default
            acceptedFiles: 'image/*', // 3. Solo acepta imagenes
            paramName: 'file', // The name that will be used to transfer the file
            //maxFilesize: 1, // Maximo tamaño de la imagen en MEGAS
            //maxFiles: 6, //Maximo de imagenes a procesar al mismo tiempo

            complete: function(file) { // Cuando termina de subir una imagen desaparece
                this.removeFile(file);
            },

            queuecomplete: function() { // Se emite un evento de livewire
                //Livewire.emit('refreshSection'); // Manda ejecutar el listener, en el componente: DisplayImages

                //alert('Hola !!!');

                // Parte [7/7] - Agregar el script para que el livewire se actualice

                // IMPORTANTE: Este dispatch(emit), envia dato al componente,
                // NO OLVIDES PONER LA ULTIMA COMA
                // DESPUES DE ENVIAR EL ULTIMO PARAMETRO
                Livewire.dispatch('refresh-gallery'), {
                    //open_modal: true,
                    //date: info.dateStr,
                };

                // NO SE ESTA USANDO EN ESTE MOMENTO
                // Livewire.dispatch('render-list-images'), {
                // };
            },
        }
    </script>

@stop
