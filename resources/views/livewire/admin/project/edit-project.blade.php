<div>
    {{-- Button --}}
    <div>
        <x-danger-button wire:click="$set('open', true)">
            ...
        </x-danger-button>
    </div>


    {{-- Modal --}}
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Edit project
        </x-slot>

        <x-slot name="content">

            <div class="grid grid-cols-4 gap-4 mb-3">
                <div class="col-span-2">
                    <x-label value="Project Name" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="projectEdit.name" id="" />
                    <x-input-error for="name" />
                </div>

                <div class="col-span-2">
                    <x-label value="Property Owner" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="projectEdit.owner" id="" />
                    <x-input-error for="owner" />
                </div>

            </div>
            <div class="grid grid-cols-4 gap-4 mb-3">
                <div class="col-span-2">
                    <x-label value="Company (OPTIONAL)" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="projectEdit.company"
                        id="" />
                </div>

                <div class="col-span-2">
                    <x-label value="Address" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="projectEdit.address"
                        id="" />
                    <x-input-error for="address" />
                </div>
            </div>
            <div class="grid grid-cols-6 gap-4 mb-3">
                <div class="col-span-3">
                    <x-label value="City" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="projectEdit.city"
                        id="" />
                    <x-input-error for="city" />
                </div>
                <div class="col-span-1">
                    <x-label value="State" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="projectEdit.state" id="" />
                    <x-input-error for="state" />
                </div>
                <div class="col-span-1">
                    <x-label value="Zip" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="projectEdit.zip" id="" />
                    <x-input-error for="zip" />
                </div>
            </div>
            <div class="grid grid-cols-6 gap-4 mb-3">
                <div class="col-span-2">
                    <x-label value="Phone" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="projectEdit.phone"
                        id="" />
                    <x-input-error for="phone" />
                </div>
                <div class="col-span-3">
                    <x-label value="Email" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="projectEdit.email" id="" />
                    <x-input-error for="email" />
                </div>

            </div>

            <div class="grid grid-cols-3 gap-4 mb-3">
                <div class="col-span-2">
                    <x-label value="Description" class="mb-1" />
                    <textarea wire:model.defer="projectEdit.description" class="w-full form-control" rows="4"></textarea>
                    <x-input-error for="description" />
                </div>

                <div class="col-span-1">

                </div>
            </div>




        </x-slot>

        <x-slot name="footer">

            <x-secondary-button class="mr-4" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="update">
                Update
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
