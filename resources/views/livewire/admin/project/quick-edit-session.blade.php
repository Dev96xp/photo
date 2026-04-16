<div>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Edit Session
        </x-slot>

        <x-slot name="content">

            <div class="grid grid-cols-6 gap-4 mb-3">
                <div class="col-span-4">
                    <x-label value="Session Name *" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="sessionEdit.name" />
                    <x-input-error for="sessionEdit.name" />
                </div>
                <div class="col-span-2">
                    <x-label value="Session #" class="mb-1" />
                    <x-input type="number" class="w-full" wire:model.defer="sessionEdit.sort_order" min="1" max="10" />
                    <x-input-error for="sessionEdit.sort_order" />
                </div>
            </div>

            <div class="grid grid-cols-6 gap-4 mb-3">
                <div class="col-span-3">
                    <x-label value="Date" class="mb-1" />
                    <x-input type="date" class="w-full" wire:model.defer="sessionEdit.date" />
                </div>
                <div class="col-span-3">
                    <x-label value="Time" class="mb-1" />
                    <x-input type="time" class="w-full" wire:model.defer="sessionEdit.time" />
                </div>
            </div>

            <div class="grid grid-cols-6 gap-4 mb-3">
                <div class="col-span-3">
                    <x-label value="Type *" class="mb-1" />
                    <select wire:model.defer="sessionEdit.type" class="form-control w-full">
                        @foreach ($session_types as $t)
                            <option value="{{ $t }}">{{ $t }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="sessionEdit.type" />
                </div>
                <div class="col-span-3">
                    <x-label value="Location" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="sessionEdit.location" />
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 mb-3">
                <div class="col-span-1">
                    <x-label value="Notes" class="mb-1" />
                    <textarea wire:model.defer="sessionEdit.note" class="w-full form-control" rows="3"></textarea>
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-4" wire:click="$set('open', false)">
                Cancel
            </x-secondary-button>
            <x-danger-button wire:click="update">
                Update Session
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
