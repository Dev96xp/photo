<x-app-layout>
    <div class="bg-white">
        <!-- Header -->


        <main class="isolate">
            <!-- Section 1 - Hero section -->
            <section style="{{ $active1 == 'ACTIVE' ? '' : 'display:none' }}">
                <div class="relative isolate -z-10">
                    <svg class="absolute inset-x-0 top-0 -z-10 h-[64rem] w-full stroke-gray-200 [mask-image:radial-gradient(32rem_32rem_at_center,white,transparent)]"
                        aria-hidden="true">
                        <defs>
                            <pattern id="1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84" width="200" height="200" x="50%" y="-1"
                                patternUnits="userSpaceOnUse">
                                <path d="M.5 200V.5H200" fill="none" />
                            </pattern>
                        </defs>
                        <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                            <path
                                d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z"
                                stroke-width="0" />
                        </svg>
                        <rect width="100%" height="100%" stroke-width="0"
                            fill="url(#1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84)" />
                    </svg>
                    <div class="absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
                        aria-hidden="true">
                        <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30"
                            style="clip-path: polygon(63.1% 29.5%, 100% 17.1%, 76.6% 3%, 48.4% 0%, 44.6% 4.7%, 54.5% 25.3%, 59.8% 49%, 55.2% 57.8%, 44.4% 57.2%, 27.8% 47.9%, 35.1% 81.5%, 0% 97.7%, 39.2% 100%, 35.2% 81.4%, 97.2% 52.8%, 63.1% 29.5%)">
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <div class="mx-auto max-w-7xl px-6 pb-32 pt-36 sm:pt-60 lg:px-8 lg:pt-32">
                            <div class="mx-auto max-w-2xl gap-x-14 lg:mx-0 lg:flex lg:max-w-none lg:items-center">
                                <div class="w-full max-w-xl lg:shrink-0 xl:max-w-2xl">
                                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                                        {{ $about1_note }}</h1>
                                    <p class="relative mt-6 text-lg leading-8 text-gray-600 sm:max-w-md lg:max-w-none">
                                        {{ $about1_desc }}</p>
                                </div>
                                <div
                                    class="mt-14 flex justify-end gap-8 sm:-mt-44 sm:justify-start sm:pl-20 lg:mt-0 lg:pl-0">
                                    <div
                                        class="ml-auto w-44 flex-none space-y-8 pt-32 sm:ml-0 sm:pt-80 lg:order-last lg:pt-36 xl:order-none xl:pt-80">
                                        <div class="relative">
                                            <img src="{{ Storage::url($aboutImg1) }}" alt=""
                                                class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                                            <div
                                                class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mr-auto w-44 flex-none space-y-8 sm:mr-0 sm:pt-52 lg:pt-36">
                                        <div class="relative">
                                            <img src="{{ Storage::url($aboutImg2) }}" alt=""
                                                class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                                            <div
                                                class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                            </div>
                                        </div>
                                        <div class="relative">
                                            <img src="{{ Storage::url($aboutImg3) }}" alt=""
                                                class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                                            <div
                                                class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-44 flex-none space-y-8 pt-32 sm:pt-0">
                                        <div class="relative">
                                            <img src="{{ Storage::url($aboutImg4) }}" alt=""
                                                class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                                            <div
                                                class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                            </div>
                                        </div>
                                        <div class="relative">
                                            <img src="{{ Storage::url($aboutImg5) }}" alt=""
                                                class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                                            <div
                                                class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Section 2 - Our Mission -->
            <section style="{{ $active2 == 'ACTIVE' ? '' : 'display:none' }}">
                <div class="mx-auto -mt-12 max-w-7xl px-6 sm:mt-0 lg:px-8 xl:-mt-8">
                    <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $about2_note }}</h2>
                        <div class="mt-6 flex flex-col gap-x-8 gap-y-20 lg:flex-row">
                            <div class="lg:w-full lg:max-w-2xl lg:flex-auto">
                                <p class="text-xl leading-8 text-gray-600">Mission Statement:

                                    {{ $about1_desc }}</p>
                                <div class="mt-10 max-w-xl text-base leading-7 text-gray-700">
                                    <p>At THE PALACE HALL, our mission is to create unforgettable experiences by
                                        providing
                                        a stunning and versatile space for every occasion. We are dedicated to
                                        delivering
                                        exceptional service that goes above and beyond our clients' expectations. Our
                                        passionate team works closely with you to ensure every detail is perfect,
                                        fostering
                                        a welcoming environment where creativity and connection thrive. Whether it’s a
                                        wedding, corporate event, or personal celebration, we strive to transform your
                                        vision into reality with professionalism and warmth. Our commitment to quality,
                                        innovation, and sustainability drives us to be the premier choice for events in
                                        our
                                        community.</p>
                                    <p class="mt-10">
                                        Looking for the perfect place to host your next event? At THE PLALACE HALL, we
                                        invite you to experience a stunning setting paired with exceptional service. Our
                                        dedicated team is here to bring your vision to life, ensuring every moment is
                                        memorable.

                                        Whether you’re planning a wedding, quinceañera, corporate event, or a special
                                        celebration, we
                                        offer a versatile space that can be tailored to your needs. Let us help you
                                        create
                                        an unforgettable experience for you and your guests.

                                        Contact us today to schedule a tour or discuss how we can make your event
                                        extraordinary. We can’t wait to welcome you!</p>
                                </div>
                            </div>
                            <div class="lg:flex lg:flex-auto lg:justify-center">
                                <dl class="w-64 space-y-8 xl:w-80">
                                    <div class="flex flex-col-reverse gap-y-4">
                                        <dt class="text-base leading-7 text-gray-600">Reservation all year</dt>
                                        <dd class="text-5xl font-semibold tracking-tight text-gray-900">44 events done
                                            already</dd>
                                    </div>
                                    <div class="flex flex-col-reverse gap-y-4">
                                        <dt class="text-base leading-7 text-gray-600">Capacity</dt>
                                        <dd class="text-5xl font-semibold tracking-tight text-gray-900">800 guests</dd>
                                    </div>
                                    <div class="flex flex-col-reverse gap-y-4">
                                        <dt class="text-base leading-7 text-gray-600">New users annually</dt>
                                        <dd class="text-5xl font-semibold tracking-tight text-gray-900">10,000</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Section 3 - Image section -->
            <section style="{{ $active3 == 'ACTIVE' ? '' : 'display:none' }}">
                <div class="mt-32 sm:mt-40 xl:mx-auto xl:max-w-7xl xl:px-8">
                    <img src="{{ Storage::url($aboutImageA) }}" alt=""
                        class="aspect-[5/2] w-full object-cover xl:rounded-3xl">
                </div>
            </section>


            <!-- section 4 - Values section -->
            <section style="{{ $active4 == 'ACTIVE' ? '' : 'display:none' }}">
                <div class="mx-auto mt-32 max-w-7xl px-6 sm:mt-40 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:mx-0">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our values</h2>
                        <p class="mt-6 text-lg leading-8 text-gray-600"></p>
                    </div>
                    <dl
                        class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 text-base leading-7 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                        <div>
                            <dt class="font-semibold text-gray-900">Customer Experience</dt>
                            <dd class="mt-1 text-gray-600">Prioritize creating memorable experiences
                                for guests, from the moment they enter to their departure.</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-gray-900">Quality Service</dt>
                            <dd class="mt-1 text-gray-600">Offer attentive, friendly, and professional
                                service to ensure satisfaction.</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-gray-900">Safety and Accessibility</dt>
                            <dd class="mt-1 text-gray-600">Ensure the venue is safe and accessible
                                for all guests, following all regulations and guidelines.</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-gray-900">Community Engagement</dt>
                            <dd class="mt-1 text-gray-600">Foster relationships with local businesses
                                and communities, supporting local initiatives and events.</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-gray-900">Sustainability</dt>
                            <dd class="mt-1 text-gray-600">Implement eco-friendly practices, such as waste reduction and
                                energy efficiency, to minimize environmental impact..</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-gray-900">Flexibility and Adaptability</dt>
                            <dd class="mt-1 text-gray-600">Be open to different types of events and adaptable to the
                                specific needs of clients.</dd>
                        </div>
                    </dl>
                </div>
            </section>


            <!-- Section 5 - Logo cloud -->
            <section style="{{ $active5 == 'ACTIVE' ? '' : 'display:none' }}">
                <div class="relative isolate -z-10 mt-32 sm:mt-48">
                    <div
                        class="absolute inset-x-0 top-1/2 -z-10 flex -translate-y-1/2 justify-center overflow-hidden [mask-image:radial-gradient(50%_45%_at_50%_55%,white,transparent)]">
                        <svg class="h-[40rem] w-[80rem] flex-none stroke-gray-200" aria-hidden="true">
                            <defs>
                                <pattern id="e9033f3e-f665-41a6-84ef-756f6778e6fe" width="200" height="200"
                                    x="50%" y="50%" patternUnits="userSpaceOnUse"
                                    patternTransform="translate(-100 0)">
                                    <path d="M.5 200V.5H200" fill="none" />
                                </pattern>
                            </defs>
                            <svg x="50%" y="50%" class="overflow-visible fill-gray-50">
                                <path d="M-300 0h201v201h-201Z M300 200h201v201h-201Z" stroke-width="0" />
                            </svg>
                            <rect width="100%" height="100%" stroke-width="0"
                                fill="url(#e9033f3e-f665-41a6-84ef-756f6778e6fe)" />
                        </svg>
                    </div>
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <h2 class="text-center text-lg font-semibold leading-8 text-gray-900">Trusted by the world’s
                            most
                            innovative teams</h2>
                        <div
                            class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
                            <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                                src="https://tailwindui.com/img/logos/158x48/transistor-logo-gray-900.svg"
                                alt="Transistor" width="158" height="48">
                            <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                                src="https://tailwindui.com/img/logos/158x48/reform-logo-gray-900.svg" alt="Reform"
                                width="158" height="48">
                            <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                                src="https://tailwindui.com/img/logos/158x48/tuple-logo-gray-900.svg" alt="Tuple"
                                width="158" height="48">
                            <img class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1"
                                src="https://tailwindui.com/img/logos/158x48/savvycal-logo-gray-900.svg"
                                alt="SavvyCal" width="158" height="48">
                            <img class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1"
                                src="https://tailwindui.com/img/logos/158x48/statamic-logo-gray-900.svg"
                                alt="Statamic" width="158" height="48">
                        </div>
                    </div>
                </div>
            </section>


            <!-- Section 6 - Team section -->
            <section style="{{ $active6 == 'ACTIVE' ? '' : 'display:none' }}">
                <div class="mx-auto mt-32 max-w-7xl px-6 sm:mt-48 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:mx-0">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our team</h2>
                        <p class="mt-6 text-lg leading-8 text-gray-600">Sit facilis neque ab nulla vel. Cum eos in
                            laudantium. Temporibus eos totam in dolorum. Nemo vel facere repellendus ut eos dolores
                            similique.</p>
                    </div>
                    <ul role="list"
                        class="mx-auto mt-20 grid max-w-2xl grid-cols-2 gap-x-8 gap-y-16 text-center sm:grid-cols-3 md:grid-cols-4 lg:mx-0 lg:max-w-none lg:grid-cols-5 xl:grid-cols-6">
                        <li>
                            <img class="mx-auto h-24 w-24 rounded-full"
                                src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                alt="">
                            <h3 class="mt-6 text-base font-semibold leading-7 tracking-tight text-gray-900">Michael
                                Foster
                            </h3>
                            <p class="text-sm leading-6 text-gray-600">Co-Founder / CTO</p>
                        </li>

                        <!-- More people... -->
                    </ul>
                </div>
            </section>


            <!-- Section 7 - Blog section -->
            <section style="{{ $active7 == 'ACTIVE' ? '' : 'display:none' }}">
                <div class="mx-auto mt-32 max-w-7xl px-6 sm:mt-40 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">From the blog</h2>
                        <p class="mt-2 text-lg leading-8 text-gray-600">Vel dolorem qui facilis soluta sint aspernatur
                            totam cumque.</p>
                    </div>
                    <div
                        class="mx-auto mt-16 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                        <article
                            class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                            <img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80"
                                alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
                            <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                            <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>

                            <div
                                class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">
                                <time datetime="2020-03-16" class="mr-8">Mar 16, 2020</time>
                                <div class="-ml-4 flex items-center gap-x-4">
                                    <svg viewBox="0 0 2 2" class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white/50">
                                        <circle cx="1" cy="1" r="1" />
                                    </svg>
                                    <div class="flex gap-x-2.5">
                                        <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="" class="h-6 w-6 flex-none rounded-full bg-white/10">
                                        Michael Foster
                                    </div>
                                </div>
                            </div>
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-white">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Vel expedita assumenda placeat aut nisi optio voluptates quas
                                </a>
                            </h3>
                        </article>

                        <!-- More posts... -->
                    </div>
                </div>
            </section>

        </main>

        <!-- section 8 - Footer -->
        <section style="{{ $active8 == 'ACTIVE' ? '' : 'display:none' }}">
            @livewire('footers.footer')
        </section>


    </div>

</x-app-layout>
