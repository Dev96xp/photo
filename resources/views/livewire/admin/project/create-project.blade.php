<div>
    {{-- Button --}}
    <div>
        <x-danger-button wire:click="$set('open', true)">
            Create
        </x-danger-button>
    </div>


    {{-- Modal --}}
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Create project
        </x-slot>

        <x-slot name="content">

            {{-- Selector de cliente existente --}}
            <div class="mb-4 p-3 bg-indigo-50 border border-indigo-200 rounded-lg">
                <x-label value="Fill from existing client (optional)" class="mb-1 text-indigo-700 font-semibold" />
                <select wire:model.live="selected_user_id"
                    wire:change="fillFromUser($event.target.value)"
                    class="form-control w-full border-indigo-300 focus:border-indigo-500">
                    <option value="">— Select a client to auto-fill —</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} — {{ $user->email }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-4 gap-4 mb-3">
                <div class="col-span-2">
                    <x-label value="Project Name" class="mb-1" />
                    <x-input type="text" class="w-full" wire:keyup='name' wire:model.defer="name" id="" />
                    <x-input-error for="name" />
                </div>

                <div class="col-span-2">
                    <x-label value="Property Owner" class="mb-1" />
                    <x-input type="text" class="w-full" wire:keyup='owner' wire:model.defer="owner" id="" />
                    <x-input-error for="owner" />
                </div>

            </div>
            <div class="grid grid-cols-4 gap-4 mb-3">
                <div class="col-span-2">
                    <x-label value="Company (OPTIONAL)" class="mb-1" />
                    <x-input type="text" class="w-full" wire:keyup='company' wire:model.defer="company"
                        id="" />
                </div>

                <div class="col-span-2">
                    <x-label value="Address" class="mb-1" />
                    <x-input type="text" class="w-full" wire:keyup='address' wire:model.defer="address"
                        id="" />
                    <x-input-error for="address" />
                </div>
            </div>
            <div class="grid grid-cols-6 gap-4 mb-3">
                <div class="col-span-3">
                    <x-label value="City" class="mb-1" />
                    <x-input type="text" class="w-full" wire:keyup='city' wire:model.defer="city"
                        id="" />
                    <x-input-error for="city" />
                </div>
                <div class="col-span-1">
                    <x-label value="State" class="mb-1" />
                    <x-input type="text" class="w-full" wire:keyup='state' wire:model.defer="state" id="" />
                    <x-input-error for="state" />
                </div>
                <div class="col-span-1">
                    <x-label value="Zip Code" class="mb-1" />
                    <x-input type="text" class="w-full" wire:keyup='zip' wire:model.defer="zip" id="" />
                    <x-input-error for="zip" />
                </div>
            </div>
            <div class="grid grid-cols-6 gap-4 mb-3">
                <div class="col-span-2">
                    <x-label value="Phone" class="mb-1" />
                    <x-input type="text" class="w-full" wire:keyup='phone' wire:model.defer="phone"
                        id="" />
                    <x-input-error for="phone" />
                </div>
                <div class="col-span-3">
                    <x-label value="Email" class="mb-1" />
                    <x-input type="text" class="w-full" wire:keyup='email' wire:model.defer="email" id="" />
                    <x-input-error for="email" />
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
