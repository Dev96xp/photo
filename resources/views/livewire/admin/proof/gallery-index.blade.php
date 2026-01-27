<div class="mb-10">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Galleries for <span
                        class="text-blue">{{ $user->name }}</span></h1>

            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                @livewire('admin.proof.create-proof-gallery')
            </div>
        </div>
        <div class="mt-2 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                    Gallery
                                    name</th>
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Status
                                </th>

                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">


                            @foreach ($galleries as $gallery)
                                <tr wire:key="galleria-{{ $gallery->id }}"> {{-- SUPER IMPORTANTE --}}
                                    <td class="whitespace-nowrap py-1 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="flex ites-center">

                                            @if ($gallery->images->count())
                                                <div class="h-11 w-11 flex-shrink-0">
                                                    <img class="h-11 w-11 rounded-full"
                                                        src="{{ Storage::url($gallery->images->first()->url) }}"
                                                        alt="">
                                                </div>
                                            @else
                                            @endif

                                            <div class="ml-4" wire:click="select_gallery({{ $gallery }})">
                                                <div
                                                    class="font-bold {{ $galleria_selecionada == $gallery->name ? 'text-green-500 text-md' : '' }}">
                                                    {{ $gallery->name }} </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="whitespace-nowrap px-3 py-1 text-sm text-gray-500">
                                        <div class="text-gray-900 font-bold">{{ $gallery->code }}</div>
                                    </td>

                                    {{-- @can('Delete proofing gallery') --}}
                                    {{-- Borra galleria usando SweetAlert2 - Pasos hasta abajo--}}
                                    <td wire:click="$dispatch('delete-images', { gallery: {{ $gallery }} })"
                                        class="relative text-red-600 hover:text-red-900 whitespace-nowrap py-1 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        Delete
                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap">

                                        @switch($gallery->status)
                                            @case('ACTIVE')
                                                <span>
                                                    <buttons class="btn btn-green ml-2 px-2 py-0 font-normal text-blue text-sm"
                                                        wire:click="update_status({{ $gallery->id }})">
                                                        {{ $gallery->status }}</buttons>
                                                </span>
                                            @break

                                            @case('VIEW')
                                                <span>
                                                    <buttons class="btn btn-blue ml-2 px-2 py-0 font-normal text-grenn text-sm"
                                                        wire:click="update_status({{ $gallery->id }})">
                                                        {{ $gallery->status}}</buttons>
                                                </span>
                                            @break

                                            @case('HIDE')
                                                <span>
                                                    <buttons class="btn btn-orange ml-2 px-2 py-0 font-normal text-gray text-sm"
                                                        wire:click="update_status({{ $gallery->id }})">
                                                        {{ $gallery->status }}</buttons>
                                                </span>
                                            @break

                                            @default
                                        @endswitch
                                    </td>

                                    {{-- @can('Upload images') --}}
                                    <td width="10px">
                                        <a class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                            href="{{ route('admin.proof.upload_images', $gallery) }}">Upload</a>
                                    </td>
                                    {{-- @endcan --}}


                                </tr>
                            @endforeach

                            <!-- More people... -->


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @script
        <script>
            // NUEVO 2024
            // 1. Esta a la escucha del evento 'delete_images'
            // 2. Al mismo tiempo recive la variable $gallery
            $wire.on('delete-images', ($gallery) => {
                Swal.fire({
                    title: "Are you sure?, you want to delete this gallery with all the images included",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        // NUEVO 2024
                        // 3. Se despacha un evento: 'delete_gallery' ,
                        // 4. y al mismo tiempo se envia la variable: $gallery
                        Livewire.dispatch('delete_gallery', $gallery);

                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            });
        </script>
    @endscript
@endpush
