<x-app-layout>

    <div class="bg-gray-50 min-h-screen">
        <div class="mx-auto max-w-7xl px-3 py-6 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-6">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">My Photo Sessions</h1>
                <p class="mt-1 text-sm text-gray-500">{{ auth()->user()->name }} &bull; {{ auth()->user()->email }}</p>
            </div>

            @if($projects->isEmpty())
                <div class="text-center py-20 bg-white rounded-2xl border border-dashed border-gray-300">
                    <div class="text-6xl mb-4">📷</div>
                    <h3 class="text-xl font-semibold text-gray-600">No photo sessions yet</h3>
                    <p class="text-sm text-gray-400 mt-1">Your galleries will appear here once they are ready.</p>
                </div>
            @else
                @foreach($projects as $project)
                    <div class="mb-10">

                        {{-- Project header --}}
                        <div class="flex items-center gap-3 mb-4 pb-3 border-b border-gray-200">
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-indigo-100 text-indigo-700 font-bold text-lg flex-shrink-0">
                                {{ strtoupper(substr($project->name, 0, 1)) }}
                            </span>
                            <div>
                                <h2 class="text-lg sm:text-xl font-bold text-gray-800 leading-tight">{{ $project->name }}</h2>
                                @if($project->description)
                                    <p class="text-sm text-gray-500">{{ $project->description }}</p>
                                @endif
                            </div>
                        </div>

                        @if($project->sessions->isEmpty())
                            <p class="text-sm text-gray-400 pl-2">No sessions available yet.</p>
                        @else
                            @foreach($project->sessions as $session)
                                <div class="mb-5 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

                                    {{-- Session header --}}
                                    <div class="px-4 py-3 bg-gray-800 flex items-center gap-3 flex-wrap">
                                        <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-blue-600 text-white text-xs font-bold flex-shrink-0">
                                            {{ $session->sort_order }}
                                        </span>
                                        <div class="flex flex-wrap items-center gap-x-2 gap-y-1 min-w-0">
                                            <span class="text-white font-semibold text-sm sm:text-base">{{ $session->name }}</span>
                                            @if($session->date)
                                                <span class="text-xs text-gray-400">{{ $session->date->format('M d, Y') }}</span>
                                            @endif
                                            <span class="text-xs text-gray-400 bg-gray-700 px-2 py-0.5 rounded-full">{{ $session->type }}</span>
                                        </div>
                                    </div>

                                    {{-- Galleries --}}
                                    @if($session->galleries->isEmpty())
                                        <div class="px-4 py-6 text-center text-sm text-gray-400">
                                            No galleries available yet.
                                        </div>
                                    @else
                                        {{-- Un solo Alpine por sesión: solo una gallery abierta a la vez --}}
                                        <div class="p-3 sm:p-5 grid grid-cols-1 sm:grid-cols-2 gap-3">
                                            @foreach($session->galleries as $gallery)
                                                <a href="{{ route('photography.my-gallery', $gallery) }}"
                                                    class="flex items-center gap-3 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 hover:bg-indigo-50 hover:border-indigo-300 transition-colors group">

                                                    {{-- Thumbnail --}}
                                                    @if($gallery->images->count())
                                                        <img src="{{ Storage::url($gallery->images->first()->url) }}"
                                                            class="w-14 h-14 object-cover rounded-lg border border-gray-200 flex-shrink-0"
                                                            alt="">
                                                    @else
                                                        <div class="w-14 h-14 rounded-lg bg-gray-200 border border-gray-300 flex items-center justify-center flex-shrink-0">
                                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                            </svg>
                                                        </div>
                                                    @endif

                                                    {{-- Info --}}
                                                    <div class="flex-1 min-w-0">
                                                        <div class="text-sm font-bold text-gray-800 group-hover:text-indigo-700 truncate">{{ $gallery->name }}</div>
                                                        <div class="text-xs text-gray-400 mt-0.5">{{ $gallery->images->count() }} photos</div>
                                                        @php $selected = $gallery->images->where('status', 2)->count(); @endphp
                                                        @if($selected > 0)
                                                            <div class="inline-flex items-center gap-1 mt-1">
                                                                <i class="fas fa-heart text-pink-500 text-xs"></i>
                                                                <span class="text-xs text-pink-500 font-semibold">{{ $selected }} selected</span>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <svg class="w-4 h-4 text-gray-400 group-hover:text-indigo-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
