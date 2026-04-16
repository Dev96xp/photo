<div>
    {{-- Counter --}}
    <div class="flex items-center justify-between mb-4 px-1">
        <span class="text-sm text-gray-500">
            Total: <strong class="text-gray-700">{{ $gallery->images->count() }}</strong> photos
        </span>
        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-pink-50 border border-pink-200">
            <i class="fas fa-heart text-pink-500 text-sm"></i>
            <span class="text-sm font-bold text-pink-600">
                {{ $gallery->images->where('status', 2)->count() }}
            </span>
            <span class="text-xs text-pink-400">selected</span>
        </span>
    </div>

    {{-- Image grid --}}
    @if($gallery->images->isEmpty())
        <div class="text-center py-12 text-gray-400">No photos uploaded yet.</div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2">
            @foreach($gallery->images as $image)
                <div class="relative group overflow-hidden rounded-xl border border-gray-200 bg-gray-100">

                    {{-- Photo --}}
                    <a href="{{ Storage::url($image->url) }}"
                        data-lightbox="gallery-{{ $gallery->id }}"
                        data-title="{{ $image->name ?? $gallery->name }}">
                        <img src="{{ Storage::url($image->url) }}"
                            loading="lazy"
                            class="w-full aspect-square object-cover cursor-pointer hover:opacity-90 transition-opacity"
                            alt="{{ $image->name ?? '' }}">
                    </a>

                    {{-- Heart button --}}
                    <button wire:click="toggleHeart({{ $image->id }})"
                        class="absolute top-2 right-2 w-9 h-9 rounded-full flex items-center justify-center shadow-md transition-all
                            {{ $image->status == 2 ? 'bg-pink-500 text-white' : 'bg-white/80 text-gray-400 hover:text-pink-500' }}">
                        <i class="{{ $image->status == 2 ? 'fas' : 'far' }} fa-heart text-lg"></i>
                    </button>

                    {{-- Name --}}
                    @if($image->name)
                        <div class="absolute bottom-0 left-0 right-0 bg-black/60 px-2 py-1">
                            <span class="text-white text-xs font-medium truncate block text-center">{{ $image->name }}</span>
                        </div>
                    @endif

                </div>
            @endforeach
        </div>
    @endif
</div>
