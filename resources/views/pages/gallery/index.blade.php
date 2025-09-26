<x-app-layout>

    {{-- USO: GALLERIA DE FOTOS PARA EL WEBSITE(DEL SALON EB EN GENERAL) --}}

    {{-- METODO 1 - EFECTO MASONRY LAYOUT --}}
    {{-- <div class="columns-4 gap-3 w-[1200px] mx-auto apace-y-3 pb-28">    ORIGINAL --}}
    <div class="mx-3">
        <div class="columns-1 md:columns-2 lg:columns-3 gap-3 w-full mx-auto apace-y-3 pb-28">
            @foreach ($sectionxes as $section)
                @foreach ($section->images as $image)
                    <a href="">
                        <div class="bg-gray-200 break-inside-avoid mb-3">
                            <img src="{{ Storage::url($image->url) }}" alt="">
                        </div>
                    </a>
                @endforeach
            @endforeach
        </div>
    </div>

    @livewire('footers.footer')

</x-app-layout>
