<div>
    {{-- Button --}}
    <div class="my-1">
        <x-danger-button wire:click="$set('open', true)">
            Gasto
        </x-danger-button>
    </div>


    {{-- Modal --}}
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Create expense / Crear gasto
        </x-slot>

        <x-slot name="content">

            <div class="grid grid-cols-3 gap-4 mb-3">

                <div class="col-span-1">
                    <x-label value="Vendor" class="mb-1" />

                    <select wire:model.live="vendor_id" class="form-control w-full">
                        {{-- Este es el valor por default --}}
                        <option value="" selected disabled>Vendor</option>

                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="vendor_id" />
                </div>


                <div class="col-span-2">
                    <x-label value="Concepto" class="mb-1" />
                    <x-input type="text" class="w-full" wire:keyup='name' wire:model.defer="name" id="" />
                    <x-input-error for="name" />
                </div>



            </div>



            <div class="grid grid-cols-4 gap-4 mb-3">
                <div class="col-span-1">
                    <x-label value="Cost USD" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.live="cost" id="cost" />
                    <x-input-error for="cost" />
                </div>

                <div class="col-span-3">
                    <x-label value="Projecto" class="mb-1" />

                    <select wire:model.live="project_id" class="form-control w-full">
                        {{-- Este es el valor por default --}}
                        <option value="" selected disabled>Projecto</option>

                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="project_id" />
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 mb-3">
                <div class="col-span-2">
                    <x-label value="Description" class="mb-1" />
                    <textarea wire:model.defer="description" class="w-full form-control" rows="4"></textarea>
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
