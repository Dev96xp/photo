<div class="py-2 px-0">

    {{-- Toolbar --}}
    <div class="flex flex-col lg:flex-row lg:items-center gap-3 mb-4">
        <div class="flex gap-2 flex-1 flex-wrap">

            {{-- Store selector --}}
            <select wire:model.live="store_id"
                class="form-control shadow-sm bg-gray-800 border-gray-700 text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 w-auto">
                <option value="" selected disabled>All Stores</option>
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                @endforeach
            </select>

            {{-- Search --}}
            <input wire:keydown="limpiar_page" wire:model="search"
                placeholder="Search by name..."
                class="form-control shadow-sm bg-gray-800 border-gray-700 text-gray-200 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 flex-1">
        </div>

        {{-- Create user --}}
        <div>
            @livewire('admin.user.create-user')
        </div>
    </div>

    {{-- Hidden inputs for DYMO --}}
    <input type="hidden" id="lbCase"  wire:model="lbCase">
    <input type="hidden" id="lbCode"  wire:model="lbCode">
    <input type="hidden" id="lbName"  wire:model="lbName">
    <input type="hidden" id="lbPhone" wire:model="lbPhone">
    <input type="hidden" id="lbStore" wire:model="lbStore">

    @if ($users->count())

        {{-- Desktop table --}}
        <div class="hidden lg:block bg-gray-800 rounded-xl shadow-lg border border-gray-700 overflow-hidden">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-900 border-b border-gray-700">
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">ID</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Contact</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Address</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Store</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach ($users as $user)
                        <tr wire:key="user-{{ $user->id }}" class="hover:bg-gray-750 transition-colors">

                            {{-- ID --}}
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="text-xs text-gray-500 font-mono">#{{ $user->id }}</span>
                            </td>

                            {{-- Name --}}
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <span class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-indigo-900 text-indigo-300 font-bold text-sm border border-indigo-700 flex-shrink-0">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </span>
                                    <div>
                                        <a href="{{ route('admin.pos.index', $user) }}"
                                            class="text-sm font-semibold text-white hover:text-indigo-300 transition-colors">
                                            {{ $user->name }}
                                        </a>
                                        @if(empty($user->store_id))
                                            <div class="text-xs text-yellow-500">No store assigned</div>
                                        @else
                                            <div class="text-xs text-gray-400">{{ $user->store->name }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            {{-- Contact --}}
                            <td class="px-4 py-3">
                                <div class="text-sm text-gray-300">{{ $user->phone }}</div>
                                <div class="text-xs text-gray-500">{{ $user->email }}</div>
                            </td>

                            {{-- Address --}}
                            <td class="px-4 py-3">
                                <div class="text-sm text-gray-300">{{ $user->address }}</div>
                                <div class="text-xs text-gray-500">{{ $user->city }}</div>
                            </td>

                            {{-- IPs --}}
                            <td class="px-4 py-3">
                                <div class="text-xs text-gray-400 font-mono">
                                    @foreach ($user->ipxes as $ipx)
                                        <span>{{ $ipx->ip }}</span>
                                    @endforeach
                                </div>
                            </td>

                            {{-- Actions --}}
                            <td class="px-4 py-3 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-2">

                                    @livewire('admin.user.edit-user', ['user' => $user], key($user->id))

                                    @can('User edit')
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-blue-900 text-blue-300 border border-blue-700 hover:bg-blue-800 text-xs font-semibold transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                            </svg>
                                            Roles
                                        </a>
                                    @endcan

                                    <button wire:click="select_user({{ $user->id }})"
                                        class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-gray-700 text-gray-300 border border-gray-600 hover:bg-gray-600 text-xs font-semibold transition-colors"
                                        title="DYMO Label">
                                        DYMO
                                    </button>

                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="px-4 py-3 bg-gray-900 border-t border-gray-700">
                {{ $users->links() }}
            </div>
        </div>

        {{-- Mobile cards --}}
        <div class="block lg:hidden space-y-3">
            @foreach ($users as $user)
                <div wire:key="mob-{{ $user->id }}" class="bg-gray-800 rounded-xl border border-gray-700 p-4">
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-indigo-900 text-indigo-300 font-bold text-sm border border-indigo-700 flex-shrink-0">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </span>
                            <div class="min-w-0">
                                <a href="{{ route('admin.pos.index', $user) }}"
                                    class="text-sm font-semibold text-white hover:text-indigo-300 truncate block">
                                    {{ $user->name }}
                                </a>
                                <div class="text-xs text-gray-400">{{ $user->phone }}</div>
                                <div class="text-xs text-gray-500">{{ $user->email }}</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 flex-shrink-0">
                            @livewire('admin.user.edit-user', ['user' => $user], key('mob-' . $user->id))
                            @can('User edit')
                                <a href="{{ route('admin.users.edit', $user) }}"
                                    class="inline-flex items-center px-2 py-1 rounded-md bg-blue-900 text-blue-300 border border-blue-700 hover:bg-blue-800 text-xs font-semibold transition-colors">
                                    Roles
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="py-2">
                {{ $users->links() }}
            </div>
        </div>

    @else
        <div class="bg-gray-800 rounded-xl border border-dashed border-gray-600 p-12 text-center">
            <div class="text-5xl mb-4">👤</div>
            <h3 class="text-lg font-semibold text-gray-300 mb-1">No clients found</h3>
            <p class="text-sm text-gray-500">Try adjusting your search or create a new client.</p>
        </div>
    @endif

</div>
