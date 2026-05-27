<x-app-layout>

    <style>
        body { background-color: #0a0a0f !important; }
        .app-bg { background-color: #0a0a0f; }
    </style>

    <div class="app-bg min-h-screen">
        <div class="mx-auto max-w-4xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- Back + Header --}}
            <div class="flex items-start gap-4 mb-8">
                <a href="{{ route('photography.my-images-2') }}"
                    class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-gray-800 border border-gray-700 text-gray-400 hover:text-white hover:border-gray-500 transition-all flex-shrink-0 mt-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-white leading-tight">{{ $gallery->name }}</h1>
                    <p class="text-sm text-gray-500 mt-0.5">
                        {{ $gallery->session->name ?? '' }}
                        @if($gallery->session->date ?? false)
                            &bull; {{ $gallery->session->date->format('M d, Y') }}
                        @endif
                        &bull; <span class="font-mono text-gray-600">{{ $gallery->code }}</span>
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
