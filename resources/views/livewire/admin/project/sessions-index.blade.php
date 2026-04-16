<div class="py-2 px-0">

    {{-- ===== PROJECT INFO CARD ===== --}}
    <div class="bg-gray-800 rounded-xl shadow-lg p-5 mb-5 border border-gray-700">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

            {{-- Info del cliente --}}
            <div>
                <div class="flex items-center gap-3 mb-1">
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-indigo-600 text-white font-bold text-lg">
                        {{ strtoupper(substr($project->name, 0, 1)) }}
                    </span>
                    <div>
                        <h2 class="text-xl font-bold text-white leading-tight">{{ $project->name }}</h2>
                        <span class="text-xs text-indigo-400 font-mono">{{ $project->code ?? '' }}</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-x-8 gap-y-1 mt-3">
                    <div class="flex items-center gap-2 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        {{ $project->owner }}
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        {{ $project->phone }}
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        {{ $project->email }}
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-400 lg:col-span-3">
                        <svg class="w-4 h-4 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $project->address }}, {{ $project->city }}, {{ $project->state }} {{ $project->zip }}
                    </div>
                    @if($project->description)
                    <div class="flex items-start gap-2 text-sm text-gray-400 lg:col-span-3 italic">
                        <svg class="w-4 h-4 text-gray-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                        </svg>
                        {{ $project->description }}
                    </div>
                    @endif
                </div>
            </div>

            {{-- Stats + botón Add --}}
            <div class="flex flex-col items-end gap-3">
                <div class="flex gap-3">
                    @php
                        $sessions = $project->sessions->where('status', '!=', 'DELETED');
                        $scheduled = $sessions->where('status', 'SCHEDULED')->count();
                        $completed = $sessions->where('status', 'COMPLETED')->count();
                        $cancelled = $sessions->where('status', 'CANCELLED')->count();
                    @endphp
                    <div class="text-center bg-gray-700 rounded-lg px-4 py-2">
                        <div class="text-2xl font-bold text-blue-400">{{ $scheduled }}</div>
                        <div class="text-xs text-gray-400 uppercase">Scheduled</div>
                    </div>
                    <div class="text-center bg-gray-700 rounded-lg px-4 py-2">
                        <div class="text-2xl font-bold text-green-400">{{ $completed }}</div>
                        <div class="text-xs text-gray-400 uppercase">Completed</div>
                    </div>
                    <div class="text-center bg-gray-700 rounded-lg px-4 py-2">
                        <div class="text-2xl font-bold text-red-400">{{ $cancelled }}</div>
                        <div class="text-xs text-gray-400 uppercase">Cancelled</div>
                    </div>
                </div>
                @livewire('admin.project.create-session', ['project' => $project])
            </div>

        </div>
    </div>

    {{-- ===== SESSIONS TABLE ===== --}}
    @if ($sessions->count())
        <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 overflow-hidden">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-900 border-b border-gray-700">
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider w-6"></th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Session</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider hidden lg:table-cell">Date & Time</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider hidden lg:table-cell">Type</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider hidden lg:table-cell">Location</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>

                @foreach ($sessions->sortBy('sort_order') as $session)
                    <tbody x-data="{ open: false }" class="border-b border-gray-700 last:border-b-0">

                        {{-- Fila de la session --}}
                        <tr wire:key="session-{{ $session->id }}" class="hover:bg-gray-750 transition-colors bg-gray-800">

                            {{-- Toggle --}}
                            <td class="pl-4 py-3 w-6 cursor-pointer" @click="open = !open">
                                <svg class="w-4 h-4 text-gray-400 transition-transform duration-200"
                                    :class="open ? 'rotate-90' : ''"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </td>

                            {{-- # Número --}}
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-900 text-blue-300 font-bold text-sm border border-blue-700">
                                    {{ $session->sort_order }}
                                </span>
                            </td>

                            {{-- Nombre + nota --}}
                            <td class="px-4 py-3 cursor-pointer" @click="open = !open">
                                <div class="text-sm font-semibold text-white">{{ $session->name }}</div>
                                @if($session->note)
                                    <div class="text-xs text-gray-400 mt-0.5">{{ Str::limit($session->note, 60) }}</div>
                                @endif
                            </td>

                            {{-- Fecha y hora --}}
                            <td class="px-4 py-3 whitespace-nowrap hidden lg:table-cell">
                                @if($session->date)
                                    <div class="text-sm text-gray-200 font-medium">{{ $session->date->format('M d, Y') }}</div>
                                @else
                                    <div class="text-sm text-gray-500">— No date —</div>
                                @endif
                                @if($session->time)
                                    <div class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($session->time)->format('g:i A') }}</div>
                                @endif
                            </td>

                            {{-- Tipo --}}
                            <td class="px-4 py-3 whitespace-nowrap hidden lg:table-cell">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-700 text-gray-200 border border-gray-600">
                                    {{ $session->type }}
                                </span>
                            </td>

                            {{-- Location --}}
                            <td class="px-4 py-3 hidden lg:table-cell">
                                <div class="text-sm text-gray-300 max-w-xs truncate">{{ $session->location ?? '—' }}</div>
                            </td>

                            {{-- Status --}}
                            <td class="px-4 py-3 whitespace-nowrap">
                                @switch($session->status)
                                    @case('SCHEDULED')
                                        <button wire:click="update_status({{ $session->id }})"
                                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-900 text-blue-300 border border-blue-700 hover:bg-blue-800 transition-colors cursor-pointer">
                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-400 inline-block"></span>SCHEDULED
                                        </button>
                                    @break
                                    @case('COMPLETED')
                                        <button wire:click="update_status({{ $session->id }})"
                                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-green-900 text-green-300 border border-green-700 hover:bg-green-800 transition-colors cursor-pointer">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-400 inline-block"></span>COMPLETED
                                        </button>
                                    @break
                                    @case('CANCELLED')
                                        <button wire:click="update_status({{ $session->id }})"
                                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-red-900 text-red-300 border border-red-700 hover:bg-red-800 transition-colors cursor-pointer">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-400 inline-block"></span>CANCELLED
                                        </button>
                                    @break
                                @endswitch
                            </td>

                            {{-- Acciones --}}
                            <td class="px-4 py-3 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.session.galleries', $session) }}"
                                        class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-indigo-900 text-indigo-300 border border-indigo-700 hover:bg-indigo-800 text-xs font-semibold transition-colors">
                                        🖼️
                                        @if($session->galleries->count() > 0)
                                            <span class="bg-indigo-600 text-white rounded-full px-1.5 text-xs font-bold">{{ $session->galleries->count() }}</span>
                                        @endif
                                    </a>
                                    @livewire('admin.project.edit-session', ['session' => $session], key('edit-session-' . $session->id))
                                    <button wire:click="$dispatch('delete-session', { session: {{ $session }} })"
                                        class="inline-flex items-center gap-1 px-2 py-1 rounded-md bg-gray-700 text-gray-400 border border-gray-600 hover:bg-gray-600 hover:text-gray-200 text-xs font-medium transition-colors"
                                        title="Archive session">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                                        </svg>
                                        Archive
                                    </button>
                                </div>
                            </td>

                        </tr>

                        {{-- Acordeón: galleries --}}
                        <tr x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            style="display:none;">
                            <td colspan="8" class="px-0 py-0">
                                <div class="bg-gray-900 border-t border-gray-700 px-6 py-4">

                                    @if($session->galleries->count())
                                        <div class="flex items-center justify-between mb-3">
                                            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                                Galleries ({{ $session->galleries->count() }})
                                            </span>
                                            <a href="{{ route('admin.session.galleries', $session) }}"
                                                class="text-xs text-indigo-400 hover:text-indigo-300 transition-colors">
                                                Manage all →
                                            </a>
                                        </div>
                                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
                                            @foreach($session->galleries as $gallery)
                                                <a href="{{ route('admin.session.gallery.upload', [$session, $gallery]) }}"
                                                    class="bg-gray-800 rounded-lg border border-gray-700 hover:border-indigo-500 transition-colors p-3 flex flex-col gap-2 group">

                                                    {{-- Thumbnail --}}
                                                    @if($gallery->images->count())
                                                        <img class="w-full h-20 object-cover rounded-md border border-gray-600"
                                                            src="{{ Storage::url($gallery->images->first()->url) }}" alt="">
                                                    @else
                                                        <div class="w-full h-20 rounded-md bg-gray-700 border border-gray-600 flex items-center justify-center">
                                                            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                            </svg>
                                                        </div>
                                                    @endif

                                                    <div class="flex items-center justify-between">
                                                        <span class="text-xs font-semibold text-green-400 truncate group-hover:text-white transition-colors">
                                                            {{ $gallery->name }}
                                                        </span>
                                                        <span class="text-xs text-gray-500 flex-shrink-0 ml-1">
                                                            {{ $gallery->images->count() }} 📷
                                                        </span>
                                                    </div>

                                                    <div class="flex items-center justify-between">
                                                        <span class="text-xs font-mono text-gray-500">{{ $gallery->code }}</span>
                                                        @switch($gallery->status)
                                                            @case('ACTIVE')
                                                                <span class="inline-flex items-center gap-0.5 px-1.5 py-0.5 rounded-full text-xs bg-green-900 text-green-300 border border-green-700">
                                                                    <span class="w-1 h-1 rounded-full bg-green-400 inline-block"></span>ACTIVE
                                                                </span>
                                                            @break
                                                            @case('VIEW')
                                                                <span class="inline-flex items-center gap-0.5 px-1.5 py-0.5 rounded-full text-xs bg-blue-900 text-blue-300 border border-blue-700">
                                                                    <span class="w-1 h-1 rounded-full bg-blue-400 inline-block"></span>VIEW
                                                                </span>
                                                            @break
                                                            @case('HIDE')
                                                                <span class="inline-flex items-center gap-0.5 px-1.5 py-0.5 rounded-full text-xs bg-gray-700 text-gray-300 border border-gray-600">
                                                                    <span class="w-1 h-1 rounded-full bg-gray-400 inline-block"></span>HIDE
                                                                </span>
                                                            @break
                                                        @endswitch
                                                    </div>

                                                </a>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="text-center py-4 text-gray-500 text-sm">
                                            No galleries yet.
                                            <a href="{{ route('admin.session.galleries', $session) }}"
                                                class="text-indigo-400 hover:text-indigo-300 ml-1">Add one →</a>
                                        </div>
                                    @endif

                                </div>
                            </td>
                        </tr>

                    </tbody>
                @endforeach

            </table>
        </div>

    @else
        {{-- Estado vacío --}}
        <div class="bg-gray-800 rounded-xl border border-dashed border-gray-600 p-12 text-center">
            <div class="text-5xl mb-4">📷</div>
            <h3 class="text-lg font-semibold text-gray-300 mb-1">No sessions yet</h3>
            <p class="text-sm text-gray-500 mb-4">Click <strong class="text-indigo-400">+ Add Session</strong> to create the first photo session for this project.</p>
        </div>
    @endif


    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @script
            <script>
                $wire.on('delete-session', ($session) => {
                    Swal.fire({
                        title: "Archive this session?",
                        text: "The session will be archived, not permanently deleted.",
                        icon: "question",
                        background: "#1f2937",
                        color: "#f3f4f6",
                        showCancelButton: true,
                        confirmButtonColor: "#4f46e5",
                        cancelButtonColor: "#6b7280",
                        confirmButtonText: "Yes, archive it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.dispatch('delete_session', $session);
                            Swal.fire({
                                title: "Archived!",
                                text: "Session has been archived.",
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
