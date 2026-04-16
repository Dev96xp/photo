<div class="py-2 px-0">

    {{-- Session info card --}}
    <div class="bg-gray-800 rounded-xl shadow-lg p-5 mb-5 border border-gray-700">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <div class="flex items-center gap-3 mb-1">
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-900 border border-blue-700 text-blue-300 font-bold text-lg">
                        {{ $session->sort_order }}
                    </span>
                    <div>
                        <h2 class="text-xl font-bold text-white">{{ $session->name }}</h2>
                        <span class="text-xs text-indigo-400">{{ $session->type }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-x-8 gap-y-1 mt-2">
                    @if($session->date)
                        <div class="flex items-center gap-2 text-sm text-gray-300">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ $session->date->format('M d, Y') }}
                            @if($session->time) &bull; {{ \Carbon\Carbon::parse($session->time)->format('g:i A') }} @endif
                        </div>
                    @endif
                    @if($session->location)
                        <div class="flex items-center gap-2 text-sm text-gray-300">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            {{ $session->location }}
                        </div>
                    @endif
                    <div class="flex items-center gap-2 text-sm text-gray-400 italic">
                        {{ $session->note ?? '' }}
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-end gap-3">
                <div class="text-center bg-gray-700 rounded-lg px-4 py-2">
                    <div class="text-2xl font-bold text-indigo-400">{{ $session->galleries->count() }}</div>
                    <div class="text-xs text-gray-400 uppercase">Galleries</div>
                </div>
                @livewire('admin.session.create-session-gallery', ['session' => $session])
            </div>
        </div>
    </div>

    {{-- Galleries table --}}
    @if($session->galleries->count())
        <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 overflow-hidden">
            <table class="min-w-full divide-y divide-gray-700">
                <thead>
                    <tr class="bg-gray-900">
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Gallery</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider hidden lg:table-cell">Code</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider hidden lg:table-cell">Images</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800 divide-y divide-gray-700">
                    @foreach($session->galleries as $gallery)
                        <tr wire:key="sgallery-{{ $gallery->id }}">

                            {{-- Thumbnail + nombre --}}
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    @if($gallery->images->count())
                                        <img class="w-12 h-12 rounded-lg object-cover border border-gray-600"
                                            src="{{ Storage::url($gallery->images->first()->url) }}" alt="">
                                    @else
                                        <div class="w-12 h-12 rounded-lg bg-gray-700 border border-gray-600 flex items-center justify-center">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="text-sm font-semibold text-white">{{ $gallery->name }}</div>
                                        @if($gallery->note)
                                            <div class="text-xs text-gray-400">{{ Str::limit($gallery->note, 40) }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            {{-- Code --}}
                            <td class="px-4 py-3 hidden lg:table-cell">
                                <span class="text-xs font-mono font-bold text-gray-300 bg-gray-700 px-2 py-1 rounded">
                                    {{ $gallery->code }}
                                </span>
                            </td>

                            {{-- Images count --}}
                            <td class="px-4 py-3 hidden lg:table-cell">
                                <span class="text-sm text-gray-300">{{ $gallery->images->count() }} photos</span>
                            </td>

                            {{-- Status --}}
                            <td class="px-4 py-3 whitespace-nowrap">
                                @switch($gallery->status)
                                    @case('ACTIVE')
                                        <button wire:click="update_status({{ $gallery->id }})"
                                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-green-900 text-green-300 border border-green-700 hover:bg-green-800 transition-colors">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-400 inline-block"></span>ACTIVE
                                        </button>
                                    @break
                                    @case('VIEW')
                                        <button wire:click="update_status({{ $gallery->id }})"
                                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-900 text-blue-300 border border-blue-700 hover:bg-blue-800 transition-colors">
                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-400 inline-block"></span>VIEW
                                        </button>
                                    @break
                                    @case('HIDE')
                                        <button wire:click="update_status({{ $gallery->id }})"
                                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-700 text-gray-300 border border-gray-600 hover:bg-gray-600 transition-colors">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400 inline-block"></span>HIDE
                                        </button>
                                    @break
                                @endswitch
                            </td>

                            {{-- Actions --}}
                            <td class="px-4 py-3 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.session.gallery.upload', [$session, $gallery]) }}"
                                        class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-indigo-900 text-indigo-300 border border-indigo-700 hover:bg-indigo-800 text-xs font-semibold transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                        </svg>
                                        Upload
                                    </a>
                                    <button wire:click="$dispatch('delete-session-gallery', { galleryId: {{ $gallery->id }} })"
                                        class="inline-flex items-center gap-1 px-2 py-1 rounded-md bg-gray-700 text-gray-400 border border-gray-600 hover:bg-gray-600 hover:text-gray-200 text-xs font-medium transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                                        </svg>
                                        Delete
                                    </button>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-gray-800 rounded-xl border border-dashed border-gray-600 p-12 text-center">
            <div class="text-5xl mb-4">🖼️</div>
            <h3 class="text-lg font-semibold text-gray-300 mb-1">No galleries yet</h3>
            <p class="text-sm text-gray-500">Click <strong class="text-indigo-400">+ New Gallery</strong> to create the first one.</p>
        </div>
    @endif

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @script
            <script>
                $wire.on('delete-session-gallery', ({ galleryId }) => {
                    Swal.fire({
                        title: "Delete this gallery?",
                        text: "All photos inside will be permanently deleted.",
                        icon: "warning",
                        background: "#1f2937",
                        color: "#f3f4f6",
                        showCancelButton: true,
                        confirmButtonColor: "#dc2626",
                        cancelButtonColor: "#6b7280",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $wire.dispatch('delete_session_gallery', { galleryId: galleryId });
                            Swal.fire({ title: "Deleted!", icon: "success", background: "#1f2937", color: "#f3f4f6" });
                        }
                    });
                });
            </script>
        @endscript
    @endpush

</div>
