<x-app-layout>

    <div class="bg-gray-50 min-h-screen">
        <div class="mx-auto max-w-7xl px-3 py-6 sm:px-6 lg:px-8">

            {{-- Back + Header --}}
            <div class="flex items-center gap-3 mb-6">
                <a href="{{ route('photography.my-images-2') }}"
                    class="inline-flex items-center gap-1 text-sm text-gray-500 hover:text-gray-800 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Back
                </a>
                <span class="text-gray-300">/</span>
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-800 leading-tight">{{ $gallery->name }}</h1>
                    <p class="text-xs text-gray-400">
                        {{ $gallery->session->name ?? '' }}
                        @if($gallery->session->date ?? false)
                            &bull; {{ $gallery->session->date->format('M d, Y') }}
                        @endif
                    </p>
                </div>
            </div>

            {{-- Gallery viewer with hearts --}}
            @livewire('photography.gallery-viewer', ['gallery' => $gallery], key($gallery->id))

        </div>
    </div>

    @livewire('footers.footer')

    <script src="{{ asset('js/lightbox-plus-jquery.js') }}"></script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'alwaysShowNavOnTouchDevices': true,
            'fitImagesInViewport': true,
        })
    </script>

</x-app-layout>
