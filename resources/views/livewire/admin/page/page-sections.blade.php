<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-700">Sections for <span class="text-blue">{{ $page->name }}</span></h1>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                {{-- Button --}}
                @livewire('admin.page.create-section', ['page' => $page], key($page->id))
        </div>
    </div>

    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name</th>

                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status
                            </th>

                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($sectionxes as $sectionx)
                            <tr>
                                <td class="whitespace-nowrap py-1 pl-4 pr-3 text-sm sm:pl-0">
                                    <div class="flex items-center">
                                        <div class="h-11 w-11 flex-shrink-0">
                                            <img class="h-11 w-11 rounded-full"
                                                src="https://cdn.pixabay.com/photo/2018/03/31/08/23/girl-3277529_1280.jpg"
                                                alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="font-bold text-gray-900">{{ $sectionx->name }}</div>
                                            <div class="text-gray-500">{{ $sectionx->description }}</div>

                                        </div>
                                    </div>
                                </td>

                                <td class="whitespace-nowrap px-3 py-1 text-sm text-gray-500">
                                    <span
                                        class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</span>
                                </td>

                                <td width="10px">
                                    <a class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-600/20"
                                        href="{{ route('admin.pages.select_images', $sectionx) }}">Photos</a>
                                </td>

                                <td wire:click="delete_section({{ $sectionx }})"
                                    class="relative text-red-600 hover:text-red-900 whitespace-nowrap py-1 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                    Delete
                                </td>

                            </tr>
                        @endforeach


                        <!-- More people... -->


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
