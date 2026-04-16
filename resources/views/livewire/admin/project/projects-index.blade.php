<div class="py-2 px-0" x-data="{ tab: 'active' }">

    {{-- Tabs --}}
    <div class="flex gap-1 mb-4 border-b border-gray-700">
        <button @click="tab = 'active'"
            :class="tab === 'active'
                ? 'bg-gray-800 text-white border-b-2 border-indigo-500'
                : 'text-gray-400 hover:text-gray-200'"
            class="px-4 py-2 text-sm font-medium rounded-t-lg transition-colors">
            Active Projects
            <span class="ml-1.5 px-1.5 py-0.5 rounded-full text-xs font-bold"
                :class="tab === 'active' ? 'bg-indigo-600 text-white' : 'bg-gray-700 text-gray-300'">
                {{ $projects->total() }}
            </span>
        </button>
        <button @click="tab = 'archived'"
            :class="tab === 'archived'
                ? 'bg-gray-800 text-white border-b-2 border-yellow-500'
                : 'text-gray-400 hover:text-gray-200'"
            class="px-4 py-2 text-sm font-medium rounded-t-lg transition-colors">
            Archived
            @if($archived->count() > 0)
                <span class="ml-1.5 px-1.5 py-0.5 rounded-full text-xs font-bold"
                    :class="tab === 'archived' ? 'bg-yellow-600 text-white' : 'bg-gray-700 text-gray-300'">
                    {{ $archived->count() }}
                </span>
            @endif
        </button>
    </div>

    {{-- TAB: ACTIVE --}}
    <div x-show="tab === 'active'" x-transition>

    {{-- Toolbar --}}
    <div class="flex flex-col lg:flex-row lg:items-center gap-3 mb-4">
        <div class="flex gap-2 flex-1">
            <input wire:model.live="search"
                class="form-control shadow-sm bg-gray-800 border-gray-700 text-gray-200 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Search project...">
        </div>
        <div>
            @livewire('admin.project.create-project')
        </div>
    </div>

    @if ($projects->count())
        <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 overflow-hidden">
            <table class="min-w-full">

                {{-- Header --}}
                <thead>
                    <tr class="bg-gray-900 border-b border-gray-700">
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider w-6"></th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Project</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider hidden lg:table-cell">Owner</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider hidden lg:table-cell">Contact</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>

                {{-- Un <tbody> por proyecto para poder usar Alpine en cada uno --}}
                @foreach ($projects as $project)
                    @php
                        $projectSessions = $project->sessions->where('status', '!=', 'DELETED')->sortBy('sort_order');
                    @endphp

                    <tbody x-data="{ open: false }" class="border-b border-gray-700 last:border-b-0">

                        {{-- Fila del proyecto --}}
                        <tr class="hover:bg-gray-750 transition-colors"
                            :class="open ? 'bg-gray-750' : ''">

                            {{-- Toggle --}}
                            <td class="pl-4 py-3 w-6 cursor-pointer" @click="open = !open">
                                <svg class="w-4 h-4 text-gray-400 transition-transform duration-200"
                                    :class="open ? 'rotate-90' : ''"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </td>

                            {{-- Proyecto --}}
                            <td class="px-4 py-3 cursor-pointer" @click="open = !open">
                                <div class="flex items-center gap-3">
                                    <span class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-indigo-900 text-indigo-300 font-bold text-sm border border-indigo-700 flex-shrink-0">
                                        {{ strtoupper(substr($project->name, 0, 1)) }}
                                    </span>
                                    <div>
                                        <div class="text-sm font-semibold text-white">{{ $project->name }}</div>
                                        <div class="text-xs text-gray-400 hidden lg:block">
                                            {{ $project->address }}, {{ $project->city }} {{ $project->state }}, {{ $project->zip }}
                                        </div>
                                        <div class="text-xs text-gray-400 block lg:hidden">
                                            {{ $project->city }}, {{ $project->state }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- Owner --}}
                            <td class="px-4 py-3 hidden lg:table-cell">
                                <div class="text-sm font-medium text-gray-200">{{ $project->owner }}</div>
                                @if($project->company)
                                    <div class="text-xs text-gray-500">{{ $project->company }}</div>
                                @endif
                            </td>

                            {{-- Contact --}}
                            <td class="px-4 py-3 hidden lg:table-cell">
                                <div class="text-xs text-gray-300">{{ $project->email }}</div>
                                <div class="text-xs text-gray-400">{{ $project->phone }}</div>
                            </td>

                            {{-- Status --}}
                            <td class="px-4 py-3 whitespace-nowrap">
                                @switch($project->status)
                                    @case('ACTIVE')
                                        <button wire:click="update_status({{ $project->id }})"
                                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-green-900 text-green-300 border border-green-700 hover:bg-green-800 transition-colors">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-400 inline-block"></span>ACTIVE
                                        </button>
                                    @break
                                    @case('CANCELLED')
                                        <button wire:click="update_status({{ $project->id }})"
                                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-red-900 text-red-300 border border-red-700 hover:bg-red-800 transition-colors">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-400 inline-block"></span>CANCELLED
                                        </button>
                                    @break
                                    @case('REVISION')
                                        <button wire:click="update_status({{ $project->id }})"
                                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-900 text-blue-300 border border-blue-700 hover:bg-blue-800 transition-colors">
                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-400 inline-block"></span>REVISION
                                        </button>
                                    @break
                                @endswitch
                            </td>

                            {{-- Acciones --}}
                            <td class="px-4 py-3 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.project.sessions', $project) }}"
                                        class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-indigo-900 text-indigo-300 border border-indigo-700 hover:bg-indigo-800 text-xs font-semibold transition-colors">
                                        📷
                                        @if($projectSessions->count() > 0)
                                            <span class="bg-indigo-600 text-white rounded-full px-1.5 text-xs font-bold">
                                                {{ $projectSessions->count() }}
                                            </span>
                                        @endif
                                    </a>

                                    @livewire('admin.project.edit-project', ['project' => $project], key('edit-project-' . $project->id))

                                    <button
                                        wire:click="$dispatch('delete-projt', { project: {{ $project }} })"
                                        class="inline-flex items-center gap-1 px-2 py-1 rounded-md bg-gray-700 text-gray-400 border border-gray-600 hover:bg-gray-600 hover:text-gray-200 text-xs font-medium transition-colors"
                                        title="Archive project">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                                        </svg>
                                        Archive
                                    </button>
                                </div>
                            </td>

                        </tr>

                        {{-- Fila acordeón: sessions --}}
                        <tr x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            style="display: none;">
                            <td colspan="6" class="px-0 py-0">
                                <div class="bg-gray-900 border-t border-gray-700 px-6 py-4">

                                    @if($projectSessions->count())
                                        <div class="mb-2 flex items-center justify-between">
                                            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                                Photo Sessions ({{ $projectSessions->count() }})
                                            </span>
                                            <a href="{{ route('admin.project.sessions', $project) }}"
                                                class="text-xs text-indigo-400 hover:text-indigo-300 transition-colors">
                                                Manage all →
                                            </a>
                                        </div>

                                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">
                                            @foreach($projectSessions as $session)
                                                <div class="bg-gray-800 rounded-lg border border-gray-700 p-3 flex flex-col gap-1 group">

                                                    {{-- Número + nombre clickeable + ícono edit --}}
                                                    <div class="flex items-center gap-2 justify-between">
                                                        <div class="flex items-center gap-2">
                                                            <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-blue-900 text-blue-300 text-xs font-bold border border-blue-700 flex-shrink-0">
                                                                {{ $session->sort_order }}
                                                            </span>
                                                            <span wire:click="$dispatch('open-edit-session', { sessionId: {{ $session->id }} })"
                                                                class="text-sm font-semibold text-indigo-300 hover:text-white underline underline-offset-2 cursor-pointer transition-colors truncate">
                                                                {{ $session->name }}
                                                            </span>
                                                        </div>
                                                        <svg class="w-3.5 h-3.5 text-gray-600 group-hover:text-indigo-400 transition-colors flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                        </svg>
                                                    </div>

                                                    {{-- Fecha y hora --}}
                                                    <div class="flex items-center gap-1 text-xs text-gray-400 pl-8">
                                                        <svg class="w-3 h-3 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                        </svg>
                                                        {{ $session->date ? $session->date->format('M d, Y') : '— No date —' }}
                                                        @if($session->time)
                                                            &bull; {{ \Carbon\Carbon::parse($session->time)->format('g:i A') }}
                                                        @endif
                                                    </div>

                                                    {{-- Tipo + location --}}
                                                    <div class="flex items-center gap-2 pl-8">
                                                        <span class="text-xs bg-gray-700 text-gray-300 px-2 py-0.5 rounded-full border border-gray-600">
                                                            {{ $session->type }}
                                                        </span>
                                                        @if($session->location)
                                                            <span class="text-xs text-gray-400 truncate">{{ $session->location }}</span>
                                                        @endif
                                                    </div>

                                                    {{-- Status --}}
                                                    <div class="pl-8 mt-1 flex items-center justify-between">
                                                        @switch($session->status)
                                                            @case('SCHEDULED')
                                                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-semibold bg-blue-900 text-blue-300 border border-blue-700">
                                                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-400 inline-block"></span>SCHEDULED
                                                                </span>
                                                            @break
                                                            @case('COMPLETED')
                                                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-semibold bg-green-900 text-green-300 border border-green-700">
                                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-400 inline-block"></span>COMPLETED
                                                                </span>
                                                            @break
                                                            @case('CANCELLED')
                                                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-semibold bg-red-900 text-red-300 border border-red-700">
                                                                    <span class="w-1.5 h-1.5 rounded-full bg-red-400 inline-block"></span>CANCELLED
                                                                </span>
                                                            @break
                                                        @endswitch

                                                        {{-- Botón Galleries --}}
                                                        <a href="{{ route('admin.session.galleries', $session) }}"
                                                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-indigo-900 text-indigo-300 border border-indigo-700 hover:bg-indigo-800 text-xs font-semibold transition-colors">
                                                            🖼️
                                                            @if($session->galleries->count() > 0)
                                                                <span class="bg-indigo-600 text-white rounded-full px-1.5 text-xs font-bold">
                                                                    {{ $session->galleries->count() }}
                                                                </span>
                                                            @endif
                                                        </a>
                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>

                                    @else
                                        <div class="text-center py-4 text-gray-500 text-sm">
                                            No sessions yet.
                                            <a href="{{ route('admin.project.sessions', $project) }}"
                                                class="text-indigo-400 hover:text-indigo-300 ml-1">Add one →</a>
                                        </div>
                                    @endif

                                </div>
                            </td>
                        </tr>

                    </tbody>
                @endforeach

            </table>

            <div class="px-4 py-3 bg-gray-900 border-t border-gray-700">
                {{-- {{ $projects->links() }} --}}
            </div>
        </div>

    @else
        <div class="bg-gray-800 rounded-xl border border-dashed border-gray-600 p-12 text-center">
            <div class="text-5xl mb-4">📁</div>
            <h3 class="text-lg font-semibold text-gray-300 mb-1">No projects found</h3>
            <p class="text-sm text-gray-500">Click <strong class="text-indigo-400">Create</strong> to add the first project.</p>
        </div>
    @endif

    </div> {{-- END TAB ACTIVE --}}

    {{-- TAB: ARCHIVED --}}
    <div x-show="tab === 'archived'" x-transition>

        @if($archived->count())
            <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 overflow-hidden">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead>
                        <tr class="bg-gray-900">
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Project</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider hidden lg:table-cell">Owner</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider hidden lg:table-cell">Archived on</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @foreach($archived as $project)
                            <tr wire:key="archived-{{ $project->id }}" class="opacity-70 hover:opacity-100 transition-opacity">

                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-3">
                                        <span class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-gray-700 text-gray-400 font-bold text-sm border border-gray-600 flex-shrink-0">
                                            {{ strtoupper(substr($project->name, 0, 1)) }}
                                        </span>
                                        <div>
                                            <div class="text-sm font-semibold text-gray-300 line-through">{{ $project->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $project->city }}, {{ $project->state }}</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-3 hidden lg:table-cell">
                                    <div class="text-sm text-gray-400">{{ $project->owner }}</div>
                                    <div class="text-xs text-gray-500">{{ $project->email }}</div>
                                </td>

                                <td class="px-4 py-3 hidden lg:table-cell">
                                    <div class="text-xs text-gray-400">{{ $project->updated_at->format('M d, Y') }}</div>
                                </td>

                                <td class="px-4 py-3 text-right">
                                    <button wire:click="restore({{ $project->id }})"
                                        class="inline-flex items-center gap-1 px-3 py-1 rounded-md bg-indigo-900 text-indigo-300 border border-indigo-700 hover:bg-indigo-800 text-xs font-semibold transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                        </svg>
                                        Restore
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-gray-800 rounded-xl border border-dashed border-gray-600 p-12 text-center">
                <div class="text-5xl mb-4">🗂️</div>
                <h3 class="text-lg font-semibold text-gray-300 mb-1">No archived projects</h3>
                <p class="text-sm text-gray-500">Archived projects will appear here.</p>
            </div>
        @endif

    </div> {{-- END TAB ARCHIVED --}}

    {{-- Modal de edición rápida de sesión (un solo componente para toda la página) --}}
    @livewire('admin.project.quick-edit-session')

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @script
            <script>
                $wire.on('delete-projt', ($project) => {
                    Swal.fire({
                        title: "Archive this project?",
                        text: "The project will be archived, not permanently deleted.",
                        icon: "question",
                        background: "#1f2937",
                        color: "#f3f4f6",
                        showCancelButton: true,
                        confirmButtonColor: "#4f46e5",
                        cancelButtonColor: "#6b7280",
                        confirmButtonText: "Yes, archive it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.dispatch('delete_project', $project);
                            Swal.fire({
                                title: "Archived!",
                                text: "Project has been archived.",
                                icon: "success",
                                background: "#1f2937",
                                color: "#f3f4f6",
                            });
                        }
                    });
                });
            </script>
        @endscript
    @endpush

</div>
