<div class="py-2 px-0">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 mb-2">
        <div class="col-span-1">
            <div class="grid grid-cols-4 gap-2">
                <div class="col-span-2">
                    <input wire:keydown="limpiar_page" wire:model.live="search" class="form-control shadow-sm"
                        placeholder="Ingrese el name...">
                </div>

                <div class="col-span-1">
                    {{-- @can('Create project') --}}
                    <div class="col-span-1">
                        @livewire('admin.project.create-project')
                    </div>
                    {{-- @endcan --}}

                </div>


            </div>
        </div>
    </div>

    <x-table-responsive>

        {{-- Si por lo menos hay un registro se muestra la tabla --}}
        @if ($projects->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        {{-- <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th> --}}

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Project Name
                        </th>

                    </tr>
                </thead>

                <tbody class="bg-gray-600 divide-y divide-gray-200">
                    @foreach ($projects as $project)
                        <tr wire:key="gastos-{{ $project->id }}">

                            <td class="px-0 py-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-bold text-gray-300">
                                            {{ $project->name }}
                                        </div>
                                        <div class="text-sm text-gray-300 hidden lg:block">
                                            {{ $project->address }}, {{ $project->city }} {{ $project->state }},
                                            {{ $project->zip }}
                                        </div>
                                        <div class="text-sm text-gray-300 block lg:hidden">
                                            {{ $project->address }}, {{ $project->city }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-0 py-2 whitespace-nowrap hidden lg:block">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class="text-sm font-bold text-gray-300">
                                            {{ $project->owner }}
                                        </div>

                                        <div class="text-sm text-gray-300">
                                            {{ Str::limit($project->description, 30) }}
                                        </div>
                                    </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">

                                @switch($project->status)
                                    @case('ACTIVE')
                                        <span>
                                            <buttons
                                                class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20"
                                                wire:click="update_status({{ $project->id }})">
                                                {{ $project->status }}</buttons>
                                        </span>
                                    @break

                                    @case('CANCELLED')
                                        <span>
                                            <buttons
                                                class="inline-flex items-center rounded-md bg-red-100 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20"
                                                wire:click="update_status({{ $project->id }})">
                                                {{ $project->status }}</buttons>
                                        </span>
                                    @break

                                    @case('REVISION')
                                        <span>
                                            <buttons
                                                class="inline-flex items-center rounded-md bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-600/20"
                                                wire:click="update_status({{ $project->id }})">
                                                {{ $project->status }}</buttons>
                                        </span>
                                    @break

                                    @default
                                @endswitch
                            </td>

                            <td>
                                @livewire('admin.project.edit-project', ['project' => $project], key('edit-project' . $project->id))
                            </td>


                            {{-- Button - Delete(hide) - Pasos abajo --}}
                            <td class="px-2 py-2 whitespace-nowrap">
                                <button class="btn btn-danger btn-xs px-2 py-0"
                                    wire:click="$dispatch('delete-projt', { project: {{ $project }} })">X</button>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>


            {{-- Esto pone los links de navegacion de la pagina, en la parte de abajo --}}
            <div class="px-6 py-4">
                {{-- {{ $projects->links() }} --}}
            </div>


            {{-- EN EL CASO DE QUE NO HAYA REGISTROS --}}
        @else
            <div class="px-6 py-4">
                No hay ningun registro coincidente
            </div>

        @endif


    </x-table-responsive>


    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @script
            <script>
                // NUEVO 2025
                // 1. Esta a la escucha del evento 'delete_projt', de este formulario
                // 2. Al mismo tiempo recive la variable $project, de este formulario
                $wire.on('delete-projt', ($project) => {
                    Swal.fire({
                        title: "Are you sure?, you want to delete this project",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {

                            // NUEVO 2025
                            // 3. Se despacha un evento: 'delete_project' ,
                            // 4. y al mismo tiempo se envia la variable: $project, al componente de LIVEWIRE ProjectsIndex,
                            // ejecutando el metodo delete_project(), que borara (ocultara) el proyecto
                            Livewire.dispatch('delete_project', $project);

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

</div>
