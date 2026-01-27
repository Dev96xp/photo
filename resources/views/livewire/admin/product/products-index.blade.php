<div class="py-2 px-1">

    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-1">

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">

                {{-- SELECT CATEGORY --}}
                <div class="col-span-1">
                    {{-- El select esta sincronizado con la propiedad category_id --}}
                    <select wire:model.live="category_id" class="form-control w-full">
                        {{-- Este es el valor por default --}}
                        <option value="" selected disabled>Categories...</option>
                        {{-- Valores de la base de datos --}}
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col-span-1">
                    {{-- El select esta sincronizado con la propiedad category_id --}}
                    <select wire:model.live="brand_id" class="form-control w-full">
                        {{-- Este es el valor por default --}}
                        <option value="" selected disabled>Brands...</option>
                        {{-- Valores de la base de datos --}}
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-1 mb-4">
                    <input wire:keydown="limpiar_page" wire:model.live="search" class="form-control shadow-sm"
                        placeholder="Ingrese el modelo...">
                </div>
            </div>

        </div>

        <div class="col-span-1">
            <div class="grid sm:grid-cols-1 lg:grid-cols-3 gap-4 items-center">


                <div class="col-span-1 mb-1">
                    {{-- SEGURIDAD - PERMISO --}}
                    {{-- @can('Create Product') --}}
                    <div class="col-span-1">
                        @livewire('admin.product.create-product')
                    </div>
                    {{-- @endcan --}}
                </div>

                <div class="col-span-1">
                    {{-- SEGURIDAD - PERMISO --}}
                    {{-- Este link solo se va aparecer, alas personas que tengan el permiso: (Import/Export Product data) --}}
                    @can('Product Import/Export Data')
                        <a class="bg-blue-400 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded text-uppercase text-sm"
                            href="{{ route('admin.import') }}">Import/export file</a>
                    @endcan
                </div>

                {{-- IMPRIMIR LABEL --}}
                <div class="col-span-1">
                    <button id="printButton"
                        class="bg-blue-400 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded text-uppercase text-sm">
                        Print Label
                    </button>
                </div>

                {{-- TEST ALERTA OJO NO SE ESTA USANDO --}}
                {{-- <div class="col-span-1">
                    <button id="printButton"
                        wire:click="alerta"
                        class="bg-blue-400 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded text-uppercase text-sm">
                        Test
                    </button>
                </div> --}}

            </div>
        </div>
    </div>

    <div>
        <input type="hidden" id="lbCase" name="tcase" wire:model="lbCase">
        <input type="hidden" id="lbSku" name="sku" wire:model="lbSku">
        <input type="hidden" id="lbName" name="name" wire:model="lbName">
        <input type="hidden" id="lbPrice" name="price" wire:model="lbPrice">
        <label for="">{{ $lbSku }} - {{ $lbName }} - {{ $lbPrice }}</label>
    </div>



    {{-- QR CODE  - - -  ocultado temporalmente --}}
    {{-- <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-8 gap-4">
        <div class="cols-span-2">

            <div id="reader" width="600px" class="mb-2"></div>    QR CODE - PARTE 3/6 (READER)
            <input type="text" id="result">
        </div>
    </div> --}}

    {{-- <div>
        <div class="font-bold">{{ $customer_name }}</div>
    </div> --}}

    {{-- Products lista --}}
    <x-table-responsive>

        {{-- Si por lo menos hay un registro se muestra la tabla --}}
        @if ($products->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Editar
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Photos
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Color
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Descuento
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Prece
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Online Price
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($products as $product)
                        <tr wire:key="producto-{{ $product->id }}">
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="flex items-center">

                                    {{-- IMAGEN DEL PRODUCTO --}}
                                    <div class="flex-shrink-0 h-10 w-10">

                                        {{-- Si existe la variable $course y ademas tiene una imagen relaicionada, que imprima, de lo contrario q lo ignore --}}
                                        @isset($product->images)
                                            {{-- MASTER CLASS - $product->images->count() - Evita un error cuando no existen imagenes --}}
                                            @if ($product->images->count())
                                                <img id="picture"
                                                    class="h-10 w-10 rounded-full object-cover object-center inline-block"
                                                    src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                            @else
                                                {{-- Imagen por default en el caso de que no existiera una imagen relacionada al producto --}}
                                                <img id="picture"
                                                    class="h-10 w-10 rounded-full object-cover object-center inline-block"
                                                    src="https://images.pexels.com/photos/6147134/pexels-photo-6147134.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
                                                    alt="">
                                            @endif
                                        @else
                                            <img class="h-10 w-10 rounded-full object-cover object-center"
                                                src="https://images.pexels.com/photos/6147134/pexels-photo-6147134.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
                                                alt="">
                                        @endisset

                                    </div>


                                    {{-- NOMBRE DEL PRODUCTO --}}
                                    <div class="ml-4">
                                        {{-- PRODUCT NAME ORIGINAL --}}
                                        <div class="text-sm font-bold text-gray-700">
                                            {{ $product->name }}
                                        </div>

                                        <div class="text-sm font-bold  text-gray-700">
                                            {{ $product->sku }}
                                        </div>

                                        {{-- CATEGORIA --}}
                                        <div class="text-sm text-gray-700">
                                            {{ $product->category->name }} / {{ $product->subcategory->name }} /
                                            {{-- xxx {{ $product->group->name }} --}}
                                        </div>
                                        {{-- Colores por producto --}}
                                        @if ($product->colors->count())
                                            @foreach ($product->colors as $color)
                                                <span class="text-xs">{{ $color->name }},</span>
                                            @endforeach
                                        @else
                                            <div class="px-2 py-2">
                                                No hay ningun color
                                            </div>
                                        @endif

                                    </div>
                            </td>

                            <td>
                                {{-- PRODUCT NAME NEW --}}
                                @livewire('admin.product.edit-product', ['product' => $product], key('edit-product'.$product->id))
                            </td>

                            <td>
                                <a class="inline-flex items-center rounded-md bg-blue-50 px-3 py-2 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-600/20"
                                    href="{{ route('admin.products.select_images', $product) }}">Photos</a>
                            </td>

                            <td>
                                @livewire('admin.product.add-colors', ['product' => $product], key('add-colors'.$product->id))
                            </td>

                            <td>
                                @livewire('admin.size.create-size', ['product' => $product], key('create-size'.$product->id))
                            </td>

                            {{-- COMPANY --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $product->discount }} % - [ {{ $product->quantity }} ]
                                <div class="font-bold text-sm text-gray-700">{{ $product->brand->name }}</div>
                            </td>

                            {{-- PRECIO DEL PRODUCTO --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex items-center ">
                                    USD $ {{ $product->price }}
                                </div>
                                <div class="text-sm text-gray-500">Precio Normal</div>
                            </td>

                            {{-- PRECIO DEL PRODUCTO EN WEB --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex items-center ">
                                    USD $ {{ $product->webprice }}
                                </div>
                                <div class="text-sm text-gray-500">Precio Online</div>
                            </td>


                            {{-- MASTER CLASS --}}
                            {{-- STATUS DEL CURSO --}}
                            <td class="px-6 py-4 whitespace-nowrap">

                                @switch($product->status_product_id)
                                    @case(1)
                                        <span>
                                            <buttons class="btn btn-orange ml-2 px-2 py-0 font-normal text-white text-sm"
                                                wire:click="update_status({{ $product->id }})">
                                                {{ $product->status_product->name }}</buttons>
                                        </span>
                                    @break

                                    @case(2)
                                        <span>
                                            <buttons class="btn btn-blue ml-2 px-2 py-0 font-normal text-white text-sm"
                                                wire:click="update_status({{ $product->id }})">
                                                {{ $product->status_product->name }}</buttons>
                                        </span>
                                    @break

                                    @case(3)
                                        <span>
                                            <buttons class="btn btn-green ml-2 px-2 py-0 font-normal text-white text-sm"
                                                wire:click="update_status({{ $product->id }})">
                                                {{ $product->status_product->name }}</buttons>
                                        </span>
                                    @break

                                    @default
                                @endswitch
                            </td>


                            {{-- Editar uya no se usa --}}
                            {{-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.products.edit', $product) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td> --}}

                            {{-- Print Label - si sirve pero solo imprime sobre hoja de impresora normal
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.products.prnpriview', $product) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Print xp</a>
                            </td> --}}

                            {{-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                                wire:click="select_product({{ $product }})">
                                <div class="text-indigo-600 hover:text-indigo-900">
                                    Printx
                                </div>
                            </td> --}}

                            {{-- Select to Print label on DYMO PRINTERS --}}
                            <td class="py-1 cursor-pointer text-sm ml-2"
                                wire:click="select_product({{ $product->id }})">
                                <div class="text-indigo-600 hover:text-indigo-900">
                                    Print
                                </div>
                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>


            {{-- Esto pone los links de navegacion de la pagina, en la parte de abajo --}}
            <div class="px-6 py-4">
                {{ $products->links() }}
            </div>


            {{-- EN EL CASO DE QUE NO HAYA REGISTROS --}}
        @else
            <div class="px-6 py-4">
                No hay ningun registro coincidente
            </div>

        @endif


    </x-table-responsive>





    @push('script')
        {{-- QR CODE - PARTE 1/6 --}}
        <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>


        {{-- QR CODE - PARTE 2/6 --}}
        <script>
            function onScanSuccess(decodedText, decodedResult) {
                // handle the scanned code as you like, for example:
                //console.log(`Code matched = ${decodedText}`, decodedResult); // ORIGINAL

                // {{-- QR CODE - PARTE 4/6 --}}
                $("#result").val(decodedText)

                let qrcode = decodedText;

                livewire.emit('validateQrcode', qrcode)

                /* OJO - usando un Alert tambien trabaja, pero lo estoy evitando por ahora

                // {{-- QR CODE - PARTE 5/6 - SWEET ALERT --}}
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'El producto se scaneo con exito !!!',
                    showConfirmButton: true,
                    confirmButtonText: 'Ok'
                    //timer: 1500
                }).then((result) => {
                    if (result.isConfirmed) {

                        // {{-- QR CODE - PARTE 6/6 - LIVEWIRE EMIT --}}
                        // MASTER CLASS - Envio un evento de livewire para que se ejecute
                        // el evento en este caso: validateQrcode

                        livewire.emit('validateQrcode', qrcode)

                    }
                })

                */

            }

            function onScanFailure(error) {
                // handle scan failure, usually better to ignore and keep scanning.
                // for example:
                console.warn(`Code scan error = ${error}`);
            }

            let html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250
                    }
                },
                /* verbose= */
                false);
            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        </script>

        <script>
            Livewire.on('alerta', function() {
                dd(1);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'El producto se scaneo con exito !!!',
                    showConfirmButton: true,
                    confirmButtonText: 'Ok'
                    //timer: 1500
                }).then((result) => {
                    if (result.isConfirmed) {

                        // hacer algo

                    }
                })
            });
        </script>
    @endpush

</div>
