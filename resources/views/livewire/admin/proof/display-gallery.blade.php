<div class="w-full">

    <div class="grid grid-cols-1 gap-4 mb-3">
        {{-- Images display --}}
        <div class="col-span-1">
            <div class="container">

                @if ($gallery->images->count())
                    <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
                        <h1 class="text-2xl text-center font-semibold mb-2">Images list by Section -
                            <span class="text-purple">[ {{ $gallery->name }} ]</span>
                        </h1>

                        <ul class="flex flex-wrap">
                            @foreach ($gallery->images as $image)
                                <li class="relative mb-2" wire:key="image-{{ $image->id }}">

                                    <img class="w-24 h-40 mr-2 object-cover rounded-md cursor-pointer hover:opacity-80 transition-opacity"
                                        onclick="openLightbox({{ $loop->index }})"
                                        src="{{ Storage::url($image->url) }}" alt="">

                                    {{-- Botoon que borra las imagenes --}}
                                    <x-danger-button class="absolute right-2 top-2 w-8"
                                        wire:click="deleteImages({{ $image->id }})"
                                        wire.loading.attr="disabled"
                                        wire.target="deleteImages({{ $image->id }})">
                                        x
                                    </x-danger-button>
                                </li>
                            @endforeach
                        </ul>

                    </section>
                @endif

            </div>
        </div>

        <div class="col-span-1">
        </div>
    </div>

    {{-- LIGHTBOX MODAL --}}
    <div id="lightbox" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-90"
         onclick="closeLightboxOnBackdrop(event)">

        {{-- Botón cerrar --}}
        <button onclick="closeLightbox()"
                class="absolute top-4 right-6 text-white text-4xl font-bold leading-none hover:text-gray-300 z-10"
                title="Cerrar">
            &times;
        </button>

        {{-- Contador --}}
        <div id="lightbox-counter" class="absolute top-4 left-1/2 -translate-x-1/2 text-white text-sm bg-black bg-opacity-50 px-3 py-1 rounded-full z-10"></div>

        {{-- Botón anterior --}}
        <button onclick="prevImage()"
                class="absolute left-4 text-white text-5xl font-bold hover:text-gray-300 select-none z-10"
                title="Anterior">
            &#8249;
        </button>

        {{-- Imagen principal --}}
        <img id="lightbox-img"
             class="max-h-screen max-w-full object-contain px-16"
             src="" alt="">

        {{-- Botón siguiente --}}
        <button onclick="nextImage()"
                class="absolute right-4 text-white text-5xl font-bold hover:text-gray-300 select-none z-10"
                title="Siguiente">
            &#8250;
        </button>
    </div>

    <script>
        const lightboxImages = @json($gallery->images->map(fn($img) => \Illuminate\Support\Facades\Storage::url($img->url))->values());
        let currentIndex = 0;

        function openLightbox(index) {
            currentIndex = index;
            updateLightbox();
            const lb = document.getElementById('lightbox');
            lb.classList.remove('hidden');
            lb.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const lb = document.getElementById('lightbox');
            lb.classList.add('hidden');
            lb.classList.remove('flex');
            document.body.style.overflow = '';
        }

        function closeLightboxOnBackdrop(event) {
            if (event.target === document.getElementById('lightbox')) {
                closeLightbox();
            }
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + lightboxImages.length) % lightboxImages.length;
            updateLightbox();
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % lightboxImages.length;
            updateLightbox();
        }

        function updateLightbox() {
            document.getElementById('lightbox-img').src = lightboxImages[currentIndex];
            document.getElementById('lightbox-counter').textContent = (currentIndex + 1) + ' / ' + lightboxImages.length;
        }

        document.addEventListener('keydown', function(e) {
            const lb = document.getElementById('lightbox');
            if (lb.classList.contains('hidden')) return;
            if (e.key === 'ArrowRight') nextImage();
            if (e.key === 'ArrowLeft') prevImage();
            if (e.key === 'Escape') closeLightbox();
        });
    </script>

</div>
