<div>
    <x-danger-button wire:click="$set('open', true)">
        + New Gallery
    </x-danger-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            New Gallery — {{ $session->name }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-6 gap-4 mb-3">
                <div class="col-span-4">
                    <x-label value="Gallery Name *" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="name" placeholder="e.g. Outdoor Photos" />
                    <x-input-error for="name" />
                </div>
                <div class="col-span-2">
                    <x-label value="Code *" class="mb-1" />
                    <x-input type="text" class="w-full" wire:model.defer="code" placeholder="e.g. GAL01" maxlength="10" />
                    <x-input-error for="code" />
                </div>
            </div>

            <div class="grid grid-cols-6 gap-4 mb-3">
                <div class="col-span-3">
                    <x-label value="Status" class="mb-1" />
                    <select wire:model.defer="status" class="form-control w-full">
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="VIEW">VIEW</option>
                        <option value="HIDE">HIDE</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 mb-3">
                <div>
                    <x-label value="Notes (optional)" class="mb-1" />
                    <textarea wire:model.defer="note" class="w-full form-control" rows="2"
                        placeholder="Description or special notes..."></textarea>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-4" wire:click="$set('open', false)">Cancel</x-secondary-button>
            <x-danger-button wire:click="save">Create Gallery</x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
