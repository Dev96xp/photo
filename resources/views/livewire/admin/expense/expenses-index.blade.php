<div class="py-2 px-0">

    <div class="grid grid-cols-2 gap-4 mb-2">
        <div class="col-span-1">

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-2">

                <div class="col-span-1">
                    {{-- El select esta sincronizado con la propiedad category_id --}}
                    <select wire:model.live="vendor_id" class="form-control w-full">
                        {{-- Este es el valor por default --}}
                        <option value="" selected disabled>Vendors...</option>
                        {{-- Valores de la base de datos --}}
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-1">
                    {{-- El select esta sincronizado con la propiedad category_id --}}
                    <select wire:model.live="project_id" class="form-control w-full">
                        {{-- Este es el valor por default --}}
                        <option value="" selected disabled>Projects...</option>
                        {{-- Valores de la base de datos --}}
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 mb-2">
        <div class="col-span-1">
            <div class="grid grid-cols-4 gap-2">
                <div class="col-span-2">
                    <input wire:keydown="limpiar_page" wire:model.live="search" class="form-control shadow-sm"
                        placeholder="Ingrese el name...">
                </div>

                <div class="col-span-1">
                    @livewire('admin.expense.create-expense')
                </div>
                <div class="col-span-1">
                    @livewire('admin.expense.create-vendor')
                </div>

            </div>
        </div>
    </div>


    <x-table-responsive>

        {{-- Si por lo menos hay un registro se muestra la tabla --}}
        @if ($expenses->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        {{-- <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th> --}}

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Proyecto
                        </th>
                        <th scope="col"
                            class="hidden lg:block px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Costs
                        </th>

                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-gray-600 divide-y divide-gray-200">
                    @foreach ($expenses as $expense)
                        <tr wire:key="gastos-{{ $expense->id }}">

                            <td class="px-0 py-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-bold text-gray-300">
                                            {{ $expense->name }}
                                        </div>
                                        <div class="text-sm text-gray-300">
                                            {{ $expense->vendor->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-0 py-2 whitespace-nowrap hidden lg:block">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class="text-sm font-bold text-gray-300">
                                            Proyecto Name
                                        </div>

                                        <div class="text-sm text-gray-300">
                                            {{ Str::limit($expense->description, 30) }}
                                        </div>
                                    </div>
                            </td>

                            <td class="px-2 py-2 whitespace-nowrap">
                                {{-- <div class="text-sm text-gray-400 hidden lg:block">Costo</div> --}}
                                <div class="text-sm text-gray-300">
                                    USD $ {{ $expense->cost }}
                                </div>
                                <div class="text-sm text-gray-300 font-bold">
                                    {{ \Carbon\Carbon::parse($expense->created_at)->toFormattedDateString('l j F') }}
                                </div>
                            </td>

                            {{-- Aqui voy ... OJO OJO OJO OJO --}}
                            <td width="10px">
                                <a class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                    href="{{ route('admin.expense.upload_images', $expense) }}">Upload</a>
                            </td>


                            {{-- Button - Delete(hide) --}}
                            <td class="px-2 py-2 whitespace-nowrap">
                                <button class="btn btn-danger btn-xs px-2 py-0"
                                    wire:click="delete_expense({{ $expense }})">X</button>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>


            {{-- Esto pone los links de navegacion de la pagina, en la parte de abajo --}}
            <div class="px-6 py-4">
                {{ $expenses->links() }}
            </div>


            {{-- EN EL CASO DE QUE NO HAYA REGISTROS --}}
        @else
            <div class="px-6 py-4">
                No hay ningun registro coincidente
            </div>

        @endif


    </x-table-responsive>
</div>
