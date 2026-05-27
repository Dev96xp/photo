<x-app-layout>

    <style>
        body { background-color: #0a0a0f !important; }
        .app-bg { background-color: #0a0a0f; }
    </style>

    <div class="app-bg min-h-screen">
        <div class="mx-auto max-w-4xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8">
                <h1 class="text-3xl sm:text-4xl font-bold text-white tracking-tight">My Sessions</h1>
                <p class="mt-1 text-sm text-gray-500">{{ auth()->user()->name }} &bull; {{ auth()->user()->email }}</p>
            </div>

            @if($projects->isEmpty())
                <div class="text-center py-24 bg-gray-900 rounded-2xl border border-dashed border-gray-700">
                    <div class="text-6xl mb-4">📷</div>
                    <h3 class="text-xl font-semibold text-gray-300">No photo sessions yet</h3>
                    <p class="text-sm text-gray-500 mt-1">Your galleries will appear here once they are ready.</p>
                </div>
            @else
                @foreach($projects as $project)
                    <div class="mb-12">

                        {{-- Project header --}}
                        <div class="flex items-center gap-4 mb-5">
                            <span class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-indigo-600 text-white font-bold text-lg flex-shrink-0 shadow-lg shadow-indigo-500/30">
                                {{ strtoupper(substr($project->name, 0, 1)) }}
                            </span>
                            <div>
                                <h2 class="text-xl font-bold text-white leading-tight">{{ $project->name }}</h2>
                                @if($project->description)
                                    <p class="text-sm text-gray-500 mt-0.5">{{ $project->description }}</p>
                                @endif
                            </div>
                        </div>

                        @if($project->sessions->isEmpty())
                            <p class="text-sm text-gray-600 pl-2">No sessions available yet.</p>
                        @else
                            @foreach($project->sessions as $session)
                                <div class="mb-4 bg-gray-900 rounded-2xl border border-gray-800 overflow-hidden">

                                    {{-- Session header --}}
                                    <div class="px-5 py-4 border-b border-gray-800 flex items-center gap-3 flex-wrap">
                                        <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-blue-600 text-white text-xs font-bold flex-shrink-0">
                                            {{ $session->sort_order }}
                                        </span>
                                        <div class="flex flex-wrap items-center gap-x-3 gap-y-1 min-w-0">
                                            <span class="text-white font-semibold">{{ $session->name }}</span>
                                            @if($session->date)
                                                <span class="text-xs text-gray-500">{{ $session->date->format('M d, Y') }}</span>
                                            @endif
                                            <span class="text-xs text-gray-500 bg-gray-800 border border-gray-700 px-2 py-0.5 rounded-full">{{ $session->type }}</span>
                                        </div>
                                    </div>

                                    {{-- Galleries --}}
                                    @if($session->galleries->isEmpty())
                                        <div class="px-5 py-8 text-center text-sm text-gray-600">
                                            No galleries available yet.
                                        </div>
                                    @else
                                        <div class="p-4 grid grid-cols-1 sm:grid-cols-2 gap-3">
                                            @foreach($session->galleries as $gallery)
                                                @php $selected = $gallery->images->where('status', 2)->count(); @endphp
                                                <a href="{{ route('photography.my-gallery', $gallery) }}"
                                                    class="flex items-center gap-4 px-4 py-3 rounded-xl border border-gray-700 bg-gray-800 hover:bg-gray-750 hover:border-indigo-500 transition-all group">

                                                    {{-- Thumbnail --}}
                                                    @if($gallery->images->count())
                                                        <img src="{{ Storage::url($gallery->images->first()->url) }}"
                                                            class="w-16 h-16 object-cover rounded-xl border border-gray-700 flex-shrink-0"
                                                            alt="">
                                                    @else
                                                        <div class="w-16 h-16 rounded-xl bg-gray-700 border border-gray-600 flex items-center justify-center flex-shrink-0">
                                                            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                            </svg>
                                                        </div>
                                                    @endif

                                                    {{-- Info --}}
                                                    <div class="flex-1 min-w-0">
                                                        <div class="text-sm font-bold text-white group-hover:text-indigo-300 truncate transition-colors">{{ $gallery->name }}</div>
                                                        <div class="text-xs text-gray-500 mt-0.5">{{ $gallery->images->count() }} photos</div>
                                                        @if($selected > 0)
                                                            <div class="inline-flex items-center gap-1 mt-1.5 px-2 py-0.5 rounded-full bg-pink-500/10 border border-pink-500/20">
                                                                <i class="fas fa-heart text-pink-500 text-xs"></i>
                                                                <span class="text-xs text-pink-400 font-semibold">{{ $selected }} selected</span>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <svg class="w-4 h-4 text-gray-600 group-hover:text-indigo-400 flex-shrink-0 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                    </svg>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif

                                </div>
                            @endforeach
                        @endif

                    </div>
                @endforeach
            @endif

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
