<div>
    {{-- Button --}}
    <div class="my-1">
        <img wire:click="$set('open', true)" class="w-24 h-40 mr-2 object-cover rounded-md" src="{{ Storage::url($image->url) }}" alt="">
    </div>


    {{-- Modal --}}
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Receibed Image
        </x-slot>

        <x-slot name="content">

            <div>
                <img class="w-auto h-screen/2 mr-2 object-cover rounded-md" src="{{ Storage::url($image->url) }}" alt="">
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-4" wire:click="$set('open', false)">
                Close
            </x-secondary-button>

            {{-- <x-danger-button wire:click="save">
                Create
            </x-danger-button> --}}
        </x-slot>

    </x-dialog-modal>


    {{-- MASTER CLASS - Para que se ejecute el codigo de javascript de un componente de LIVEWIRE,
        hay que encerrarlo con las directivas de PUSH, @push('script') y que este lo envie a la
        plantilla pricipal, esta lo recibira travez de la directiva @stack('script') y listo  --}}
    @push('script')
        {{-- Nada de codigo de javascript por el momento --}}
    @endpush

</div>
