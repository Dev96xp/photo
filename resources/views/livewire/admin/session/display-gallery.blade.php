<div class="mb-5">
    @php $selectedImages = $gallery->images->where('status', 2); @endphp
    @if($selectedImages->count())
        <div class="bg-gray-800 rounded-xl border border-pink-500/40 p-4 mb-4">
            <div class="flex items-center gap-2 mb-3">
                <i class="fas fa-heart text-pink-500"></i>
                <h3 class="text-sm font-semibold text-gray-300">
                    Imágenes seleccionadas por el cliente ({{ $selectedImages->count() }})
                </h3>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                @foreach($selectedImages as $image)
                    <div wire:key="selected-img-{{ $image->id }}">
                        <div class="relative">
                            <img class="w-full h-28 object-cover rounded-lg border border-pink-500/40"
                                src="{{ Storage::url($image->url) }}" alt="">
                            <i class="fas fa-heart text-pink-500 text-sm absolute bottom-1.5 right-1.5 drop-shadow"></i>
                        </div>
                        <p class="text-xs text-gray-400 mt-1 truncate" title="{{ $image->name ?? basename($image->url) }}">
                            {{ $image->name ?? basename($image->url) }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if($gallery->images->count())
        <div class="bg-gray-800 rounded-xl border border-gray-700 p-4 mb-4">
            <div class="flex items-center justify-between mb-3">
                <h3 class="text-sm font-semibold text-gray-300">
                    {{ $gallery->images->count() }} photo(s) uploaded
                </h3>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                @foreach($gallery->images as $image)
                    <div class="relative group" wire:key="img-{{ $image->id }}">
                        <img class="w-full h-28 object-cover rounded-lg border border-gray-600"
                            src="{{ Storage::url($image->url) }}" alt="">

                        {{-- Overlay on hover --}}
                        <div class="absolute inset-0 rounded-lg bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <button
                                wire:click="$dispatch('confirm-delete-image', { imageId: {{ $image->id }} })"
                                class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-md bg-red-600 hover:bg-red-500 text-white text-xs font-semibold transition-colors shadow-lg">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Delete
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @script
        <script>
            $wire.on('confirm-delete-image', ({ imageId }) => {
                Swal.fire({
                    title: "Delete this photo?",
                    text: "This action cannot be undone.",
                    icon: "warning",
                    background: "#1f2937",
                    color: "#f3f4f6",
                    showCancelButton: true,
                    confirmButtonColor: "#dc2626",
                    cancelButtonColor: "#6b7280",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $wire.deleteImage(imageId);
                    }
                });
            });
        </script>
    @endscript
</div>
