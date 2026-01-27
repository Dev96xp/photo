<div>
    {{-- Button --}}
    <div class="my-1">
        <x-danger-button wire:click="$set('open', true)">
            Vendor
        </x-danger-button>
    </div>


    {{-- Modal --}}
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Create vendor / Crear vendedor
        </x-slot>

        <x-slot name="content">

            <div class="grid grid-cols-4 gap-2 mb-3">

                <div class="col-span-1">
                    <x-label value="Code" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="code" id="" />
                    <x-input-error for="code" />
                </div>

                <div class="col-span-3">
                    <x-label value="Vendor" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="name" id="" />
                    <x-input-error for="name" />
                </div>
            </div>

            <div class="grid grid-cols-4 gap-2 mb-3">

                <div class="col-span-3">
                    <x-label value="Address" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="address" id="" />
                    <x-input-error for="address" />
                </div>

                <div class="col-span-1">
                    <x-label value="City" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="city" id="" />
                    <x-input-error for="city" />
                </div>
            </div>
            <div class="grid grid-cols-4 gap-2 mb-3">

                <div class="col-span-1">
                    <x-label value="State" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="state" id="" />
                    <x-input-error for="state" />
                </div>

                <div class="col-span-1">
                    <x-label value="Zip" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="zip" id="" />
                    <x-input-error for="zip" />
                </div>
                <div class="col-span-2">
                    <x-label value="Email" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="email" id="" />
                    <x-input-error for="email" />
                </div>
            </div>


            <div class="grid grid-cols-4 gap-4 mb-3">
                <div class="col-span-1">
                    <x-label value="Phone" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="phone" id="" />
                    <x-input-error for="phone" />
                </div>

                <div class="col-span-3">
                    <x-label value="Status" class="mb-1"  />
                    <x-input type="text" class="w-full" wire:model.defer="status" id=""/>
                    <x-input-error for="status" />
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 mb-3">
                <div class="col-span-2">

                </div>

                <div class="col-span-1">

                </div>
            </div>




        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-4" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="save">
                Create
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>


    {{-- MASTER CLASS - Para que se ejecute el codigo de javascript de un componente de LIVEWIRE,
        hay que encerrarlo con las directivas de PUSH, @push('script') y que este lo envie a la
        plantilla pricipal, esta lo recibira travez de la directiva @stack('script') y listo  --}}
    @push('script')
        {{-- Nada de codigo de javascript por el momento --}}
    @endpush

</div>
