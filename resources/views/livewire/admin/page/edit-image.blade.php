<div>

    {{-- Button --}}
    <div>
        <button wire:click="$set('open', true)" type="button"
            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</button>

    </div>

    <x-dialog-modal wire:model="open" class="py-6" maxWidth="2xl">

        <x-slot name='title'>
            Editar Imagen X
        </x-slot>

        <x-slot name='content'>

            {{-- Grid con 3 columnas --}}
            <div class="grid grid-cols-3 gap-4 mb-2">
                <div class="col-span-2">
                    <x-label value="Name" />
                    <x-input wire:model.defer="imageEdit.name" type="text" class="w-full" />
                    {{-- Revisa por alhun error de validacion --}}
                    <x-input-error for="imageEdit.name" />
                </div>
                <div class="col-span-1">

                    <div class="color-picker"></div>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 mb-2">
                <div class="col-span-2">
                    <x-label value="Location" />
                    <x-input wire:model.defer="imageEdit.location" type="text" class="w-full" />
                    {{-- Revisa por alhun error de validacion --}}
                    <x-input-error for="imageEdit.location" />
                </div>

                <div class="col-span-1">

                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mb-2">
                <div class="col-span-2">
                    <x-label value="Note" />
                    <x-input wire:model.defer="imageEdit.note" type="text" class="w-full" />
                    {{-- Revisa por alhun error de validacion --}}
                    <x-input-error for="imageEdit.note" />
                </div>

                <div class="col-span-1">
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mb-2">
                <div class="col-span-2">
                    <x-label value="Note 1" />
                    <x-input wire:model.defer="imageEdit.note1" type="text" class="w-full" />
                    {{-- Revisa por alhun error de validacion --}}
                    <x-input-error for="imageEdit.note1" />
                </div>

                <div class="col-span-1">

                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 mb-2">
                <div class="col-span-2">
                    <x-label value="Description" />
                    <textarea wire:model.defer="imageEdit.description" type="text" cols="20" rows="5" class="w-full"></textarea>

                    {{-- Revisa por alhun error de validacion --}}
                    <x-input-error for="imageEdit.description" />
                </div>
                <div class="col-span-1">

                </div>

            </div>

        </x-slot>

        <x-slot name='footer'>
            <div class="flex">

                <div class="mr-10">
                    <x-secondary-button wire:click="$set('open', false)" class="mr-2">
                        Cancel
                    </x-secondary-button>

                    <x-danger-button wire:click="save" wire:loading.attr="disabled" class="disabled:opacity-25">
                        Update
                    </x-danger-button>
                </div>

            </div>
        </x-slot>

    </x-dialog-modal>

    {{-- MASTER CLASS - Para que se ejecute el codigo de javascript de un componente de LIVEWIRE,
        hay que encerrarlo con las directivas de PUSH, @push('script') y que este lo envie a la
        plantilla pricipal, esta lo recibira travez de la directiva @stack('script') y listo  --}}

    @push('script_color')
        {{-- Nada de codigo de javascript por el momento --}}
        <script>
            // Simple example, see optional options for more configuration.
            const pickr = Pickr.create({
                el: '.color-picker',
                theme: 'classic', // or 'monolith', or 'nano'

                swatches: [
                    'rgba(244, 67, 54, 1)',
                    'rgba(233, 30, 99, 0.95)',
                    'rgba(156, 39, 176, 0.9)',
                    'rgba(103, 58, 183, 0.85)',
                    'rgba(63, 81, 181, 0.8)',
                    'rgba(33, 150, 243, 0.75)',
                    'rgba(3, 169, 244, 0.7)',
                    'rgba(0, 188, 212, 0.7)',
                    'rgba(0, 150, 136, 0.75)',
                    'rgba(76, 175, 80, 0.8)',
                    'rgba(139, 195, 74, 0.85)',
                    'rgba(205, 220, 57, 0.9)',
                    'rgba(255, 235, 59, 0.95)',
                    'rgba(255, 193, 7, 1)'
                ],

                components: {

                    // Main components
                    preview: true,
                    opacity: true,
                    hue: true,

                    // Input / output Options
                    interaction: {
                        hex: true,
                        rgba: true,
                        hsla: true,
                        hsva: true,
                        cmyk: true,
                        input: true,
                        clear: true,
                        save: true
                    }
                }
            });

            pickr.on('change', (color, instance) => {
                const rgbaColor = color.toRGBA().toString();
                // console.log(rgbaColor);
                @this.set('imageEdit.color', rgbaColor);
            });

            pickr.on('save', (color, instance) => {
                pickr.hide();
            });

            pickr.on('clear', instance => {
                @this.set('imageEdit.color', null);
            });

            // You can use the `pickr` instance to call methods on it
            // or listen to events.
        </script>
    @endpush

    <!-- Color Picker - Modern or es5 bundle -->
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
</div>
