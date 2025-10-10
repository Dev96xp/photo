<x-app-layout>
    <!-- Testimonials section -->
    <div class="relative isolate mt-2 pb-20 sm:mt-56 sm:pt-32">
        <svg class="absolute inset-0 -z-10 hidden h-full w-full stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)] sm:block"
            aria-hidden="true">
            <defs>
                <pattern id="55d3d46d-692e-45f2-becd-d8bdc9344f45" width="200" height="200" x="50%" y="0"
                    patternUnits="userSpaceOnUse">
                    <path d="M.5 200V.5H200" fill="none" />
                </pattern>
            </defs>
            <svg x="50%" y="0" class="overflow-visible fill-gray-50">
                <path
                    d="M-200.5 0h201v201h-201Z M599.5 0h201v201h-201Z M399.5 400h201v201h-201Z M-400.5 600h201v201h-201Z"
                    stroke-width="0" />
            </svg>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#55d3d46d-692e-45f2-becd-d8bdc9344f45)" />
        </svg>
        <div class="relative">
            <div class="absolute inset-x-0 top-1/2 -z-10 -translate-y-1/2 transform-gpu overflow-hidden opacity-30 blur-3xl"
                aria-hidden="true">
                <div class="ml-[max(50%,38rem)] aspect-[1313/771] w-[82.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="absolute inset-x-0 top-0 -z-10 flex transform-gpu overflow-hidden pt-8 opacity-25 blur-3xl xl:justify-end"
                aria-hidden="true">
                <div class="ml-[-22rem] aspect-[1313/771] w-[82.0625rem] flex-none origin-top-right rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] xl:ml-0 xl:mr-[calc(50%-12rem)]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-xl sm:text-center">
                    {{-- <h2 class="text-lg font-semibold leading-8 tracking-tight text-indigo-600">Testimonials</h2> --}}
                    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">We have worked with
                        thousands of amazing people</p>
                </div>

                <div
                    class="mx-auto mt-16 grid max-w-2xl grid-cols-1 grid-rows-1 gap-8 text-sm leading-6 text-gray-900 sm:mt-20 sm:grid-cols-2 xl:mx-0 xl:max-w-none xl:grid-flow-col xl:grid-cols-4">
                    <figure
                        class="col-span-2 hidden sm:block sm:rounded-2xl sm:bg-white sm:shadow-lg sm:ring-1 sm:ring-gray-900/5 xl:col-start-2 xl:row-end-1">
                        <blockquote class="p-12 text-xl font-semibold leading-8 tracking-tight text-gray-900">
                            <p>{{$testimonial1}}</p>
                        </blockquote>
                        <figcaption class="flex items-center gap-x-4 border-t border-gray-900/10 px-6 py-4">
                            <img class="h-10 w-10 flex-none rounded-full bg-gray-50"
                                src="{{ Storage::url($testi_image1) }}" alt="">
                            <div class="flex-auto">
                                <div class="font-semibold">{{ $testi_name1 }}</div>
                                <div class="text-gray-600">{{ $testi_note1 }}</div>
                            </div>
                            <img class="h-10 w-auto flex-none"
                                src="https://tailwindui.com/img/logos/savvycal-logo-gray-900.svg" alt="">
                        </figcaption>
                    </figure>


                    <div class="space-y-8 xl:contents xl:space-y-0">
                        <div class="space-y-8 xl:row-span-2">

                            <figure class="rounded-2xl bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                                <blockquote class="text-gray-900">
                                    <p>{{$testimonial2}}</p>
                                </blockquote>
                                <figcaption class="mt-6 flex items-center gap-x-4">
                                    <img class="h-10 w-10 rounded-full bg-gray-50"
                                        src="{{ Storage::url($testi_image2) }}" alt="">
                                    <div>
                                        <div class="font-semibold">{{ $testi_name2 }}</div>
                                        <div class="text-gray-600">{{ $testi_note2 }}</div>
                                    </div>
                                </figcaption>
                            </figure>

                            <figure class="rounded-2xl bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                                <blockquote class="text-gray-900">
                                    <p>{{$testimonial3}}</p>
                                </blockquote>
                                <figcaption class="mt-6 flex items-center gap-x-4">
                                    <img class="h-10 w-10 rounded-full bg-gray-50"
                                        src="{{ Storage::url($testi_image3) }}" alt="">
                                    <div>
                                        <div class="font-semibold">{{ $testi_name3 }}</div>
                                        <div class="text-gray-600">{{ $testi_note3 }}</div>
                                    </div>
                                </figcaption>
                            </figure>
                            <!-- More testimonials... -->
                        </div>

                        <div class="space-y-8 xl:row-start-1">
                            <figure class="rounded-2xl bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                                <blockquote class="text-gray-900">
                                    <p>{{$testimonial4}}</p>
                                </blockquote>
                                <figcaption class="mt-6 flex items-center gap-x-4">
                                    <img class="h-10 w-10 rounded-full bg-gray-50"
                                        src="{{ Storage::url($testi_image4) }}" alt="">
                                    <div>
                                        <div class="font-semibold">{{ $testi_name4 }}</div>
                                        <div class="text-gray-600">{{ $testi_note4 }}</div>
                                    </div>
                                </figcaption>
                            </figure>

                            <!-- More testimonials... -->
                        </div>
                    </div>
                    <div class="space-y-8 xl:contents xl:space-y-0">
                        <div class="space-y-8 xl:row-start-1">
                            <figure class="rounded-2xl bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                                <blockquote class="text-gray-900">
                                    <p>{{$testimonial5}}</p>
                                </blockquote>
                                <figcaption class="mt-6 flex items-center gap-x-4">
                                    <img class="h-10 w-10 rounded-full bg-gray-50"
                                        src="{{ Storage::url($testi_image5) }}" alt="">
                                    <div>
                                        <div class="font-semibold">{{ $testi_name5 }}</div>
                                        <div class="text-gray-600">{{ $testi_note5 }}</div>
                                    </div>
                                </figcaption>
                            </figure>

                            <!-- More testimonials... -->
                        </div>
                        <div class="space-y-8 xl:row-span-2">
                            <figure class="rounded-2xl bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                                <blockquote class="text-gray-900">
                                    <p>{{$testimonial6}}</p>
                                </blockquote>
                                <figcaption class="mt-6 flex items-center gap-x-4">
                                    <img class="h-10 w-10 rounded-full bg-gray-50"
                                        src="{{ Storage::url($testi_image6) }}" alt="">
                                    <div>
                                        <div class="font-semibold">{{ $testi_name6 }}</div>
                                        <div class="text-gray-600">{{ $testi_note6 }}</div>
                                    </div>
                                </figcaption>
                            </figure>

                            <!-- More testimonials... -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @livewire('footers.footer')
</x-app-layout>
