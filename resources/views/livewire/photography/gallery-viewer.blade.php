<div>
    {{-- Counter bar --}}
    <div class="flex items-center justify-between mb-5 px-1">
        <span class="text-sm text-gray-500">
            <span class="text-white font-semibold">{{ $gallery->images->count() }}</span> photos
        </span>
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gray-900 border border-gray-700">
            <i class="fas fa-heart text-pink-500"></i>
            <span class="text-white font-bold">{{ $gallery->images->where('status', 2)->count() }}</span>
            <span class="text-gray-500 text-sm">selected</span>
        </div>
    </div>

    {{-- Image grid --}}
    @if($gallery->images->isEmpty())
        <div class="text-center py-16 bg-gray-900 rounded-2xl border border-dashed border-gray-700">
            <div class="text-5xl mb-3">📷</div>
            <p class="text-gray-500">No photos uploaded yet.</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
            @foreach($gallery->images as $image)
                <div class="relative group overflow-hidden rounded-2xl border border-gray-800 bg-gray-900">

                    {{-- Photo --}}
                    <a href="{{ Storage::url($image->url) }}"
                        data-lightbox="gallery-{{ $gallery->id }}"
                        data-title="{{ $image->name ?? $gallery->name }}">
                        <img src="{{ Storage::url($image->url) }}"
                            loading="lazy"
                            class="w-full aspect-square object-cover cursor-pointer transition-all duration-300 group-hover:scale-105 group-hover:opacity-80"
                            alt="{{ $image->name ?? '' }}">
                    </a>

                    {{-- Heart button --}}
                    <button wire:click="toggleHeart({{ $image->id }})"
                        class="absolute top-3 right-3 w-10 h-10 rounded-full flex items-center justify-center shadow-xl transition-all duration-200
                            {{ $image->status == 2
                                ? 'bg-pink-500 text-white scale-110 shadow-pink-500/40'
                                : 'bg-black/50 text-white/60 hover:bg-black/70 hover:text-pink-400' }}">
                        <i class="{{ $image->status == 2 ? 'fas' : 'far' }} fa-heart text-base"></i>
                    </button>

                    {{-- Name overlay --}}
                    @if($image->name)
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent px-3 py-3">
                            <span class="text-white text-xs font-medium truncate block">{{ $image->name }}</span>
                        </div>
                    @endif

                </div>
            @endforeach
        </div>
    @endif
</div>
