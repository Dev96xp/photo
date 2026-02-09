<div class="w-full">

    <div class="grid grid-cols-1 gap-4 mb-3">
        {{-- Images display, muestra las imagenes de un gasto, una vez que fueron subidas --}}
        <div class="col-span-1">
            <div class="container">


                @if ($expense->images->count())
                    <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
                        <h1 class="text-2xl text-center font-semibold mb-2">Images list by Expense -
                            <span class="text-purple">[ {{ $expense->name }} ]</span>
                        </h1>

                        <ul class="flex flex-wrap">
                            @foreach ($expense->images as $image)
                                <li class="relative mb-2" wire:key="image-{{ $image->id }}">

                                    {{-- <img class="w-24 h-40 mr-2 object-cover rounded-md"
                                        src="{{ Storage::url($image->url) }}" alt=""> --}}

                                    {{-- Modal para mostrar la imagen de lo recibos --}}
                                    @livewire('admin.expense.display-image', ['image' => $image], key($image->id))

                                    <x-danger-button class="px-0 mx-0 absolute right-2 top-2 w-4"
                                        wire:click="deleteImages({{ $image->id }})" wire.loading.attr="disabled"
                                        wire.target="deleteImages({{ $image->id }})">
                                        x
                                    </x-danger-button>

                                </li>
                            @endforeach

                        </ul>

                    </section>
                @endif




            </div>
        </div>

        <div class="col-span-1">
        </div>
    </div>


    {{-- MASTER CLASS - Para que se ejecute el codigo de javascript de un componente de LIVEWIRE,
        hay que encerrarlo con las directivas de PUSH, @push('script') y que este lo envie a la
        plantilla pricipal, esta lo recibira travez de la directiva @stack('script') y listo  --}}
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    @endpush



</div>
