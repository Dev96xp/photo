<x-app-layout>
    {{-- USO: PAGINA PRINCIPAL - HOME NO 1 --}}

    {{-- SECCTION 1 - Portada Background  IMAGEN PRINCIPAL --}}
    <section>

        {{-- Moño --}}
        {{-- <img style="width:50%" class="z-10 absolute bottom-0 left-0" src="{{ asset('img/home/AdobeStock_292882187.png') }}" alt=""> --}}


        {{-- py- Determina la altura de la imagen --}}
        {{-- MASTER CLASS - PARALLAX EFFECT - (bg-fixed bg-center bg-no-repeat bg-cover, EN ESTE CASO ELIMINE FIXED, PARA QUE TRABAJARA BIEN EN MOBIL)
                                         min-h-screen - OCUPA TODA LA ALTURA DE PANTALLA
                                         opacity-75 - Detremina la opacity Inicial
                                         hover:opacity-100 - Elimina el opacity --}}
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-64 py-40 opacity-75 relative bg-center bg-no-repeat bg-cover hover:opacity-100"
            style="background-image: url('{{ asset('img/gallery/25003786-6b3c-453e-9885-5d275016dbb7.jpg') }}')">


            <div class="w-full md:w-3/4 lg:w-3/4">
                {{-- APLICANDO UNA CONDICIONAL PARA CLASES --}}
                <p class="text-black text-6xl md:text-8xl lg:text-8xl py-6" style="font-family: Sche">THE PALACE HALL</p>
                <p class="text-white text-2xl md:text-5xl lg:text-5xl font-bold mb-60" style="font-family: Montserrat">
                    Experiance and aptitude of our team
                </p>
                <p class="text-black font-bold text-3xl mt-2 mb-4" style="font-family: Montserrat">
                    Perfect for hosting Weddings, Receptions, Corporate Events, Private Celebrations and
                    More!
                </p>


                {{-- OCULTE EL BUSCADOR TEMPORALMENTE --}}
                {{-- @livewire('search') --}}


                {{-- COVER --}}
                <div class="absolute right-10 bottom-2">
                    <p class="text-white font-bold" style="font-family: Montserrat"></p>
                </div>
            </div>
        </div>

    </section>

    {{-- <section>
        <picture>
            <source media="(max-width: 799px)" srcset="{{ asset('img/home/pexels-matheus-bertelli-17023014.jpg') }}">
            <source media="(min-width: 800px)" srcset="{{ asset('img/home/pexels-matheus-bertelli-17023020.jpg') }}">
            <img src="" alt="Chris standing up holding his daughter Elva">
          </picture>
    </section> --}}

    {{-- VIDEO --}}
    {{-- <section>
        <video id="my-video" class="video-js" controls preload="auto" width="auto" height="600" data-setup="{}" autoplay="off">
            <source src="/img/video/morilee.mp4" type='video/mp4'>
        </video>
        <div class="media">
            <div class="media-body">
                <iframe width="560" height="315" src="/img/video/morilee.mp4" frameborder="0" allowfullscreen>
                </iframe>
            </div>
        </div>
    </section> --}


    {{-- SECCTION 2 - Contenido con 4 articulos --}}
    <section class="mt-6">
        <h1 class="text-gray-800 text-center text-4xl mb-6 font-bold"
            style="my-6 font-family: proxima-nova, sans-serif;font-weight: 800;font-style: normal">AT YOUR SERVICE</h1>
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            {{-- ARTICULO 1 --}}
            <article>
                <figure>
                    <a href="gallery"><img class="rounded-xl lg:h-40 w-full object-cover opacity-75"
                            src="{{ asset('img/home/pexels-rene-asmussen-2504968.jpg') }}" alt=""></a>

                    <header class="mt-2">
                        <a href="gallery">
                            <h1 class="text-center text-xl text-gray-700">Weddings</h1>
                        </a>
                    </header>

                    <a href="gallery" class="mt-2">
                        <p>From an intimate ceremony to a lavish formal gala, you can make your special day what you
                            have
                            always dreamed. Our main dining room can be arranged to suit your wishes</p>
                    </a>

                </figure>
            </article>

            {{-- ARTICULO 2 --}}
            <article>
                <figure>
                    <img class="rounded-xl lg:h-40 w-full object-cover opacity-75"
                        src="{{ asset('img/home/DSC_3053.jpg') }}" alt="">
                    <header class="mt-2">
                        <a href="#">
                            <h1 class="text-center text-xl text-gray-700">Events</h1>
                        </a>
                    </header>
                    <a href="#" class="mt-2">
                        <p>If you book your event at this location, you can expect to see lots of natural light, on a
                            beuatifull cozy large space for until 500 people
                            Moreover, the Venue is
                            located on the mall with free parking and can be accessed via public transport</p>
                    </a>

                </figure>
            </article>

            {{-- ARTICULO 3 --}}
            <article>
                <figure>
                    <a href="gallery">
                        <img class="rounded-xl lg:h-40 w-full object-cover opacity-75"
                            src="{{ asset('img/home/DSC_3085.jpg') }}" alt="">
                    </a>
                    <header class="mt-2">
                        <a href="gallery">
                            <h1 class="text-center text-xl text-gray-700">Quinceañeras</h1>
                        </a>
                    </header>
                    <a href="gallery" class="mt-2">
                        <p>If you’re looking for a Quinceañera venue that offers something for everyone, then THE PALACE
                            HALL
                            Event Center is your perfect fit, you’ll be able to
                            accommodate as many or as few guests as desired. No matter what the occasion, we are
                            confident
                            that your Quinceañera will be the most memorable event of your life!</p>
                    </a>
                </figure>
            </article>

            {{-- ARTICULO 4 --}}
            <article>
                <figure>
                    <img class="rounded-xl lg:h-40 w-full object-cover opacity-75"
                        src="{{ asset('img/home/DSC_3035.jpg') }}" alt="">
                    <header class="mt-2">
                        <h1 class="text-center text-xl text-gray-700">Professional and Bueatifull</h1>
                    </header>
                    <p>Their portfolio spans weddings of all kind, each specifically designed to speak to the essence of
                        each couple’s
                        unique preferences and tastes.</p>
                </figure>
            </article>
        </div>
    </section>


    {{-- SECCTION 6 - Banda de productos --}}
    <section class="my-24 mx-auto px-4 sm:px-6 lg:px-64">
        <h1 class="text-center text-3xl text-gray-600">Events Type</h1>
        <p class="text-center text-gray-500 text-xl mb-6"> </p>

        <div class="text-center">
            <h2>Wedding Receptions</h2>
            <h2>Corporate Events</h2>
            <h2>Holiday Parties</h2>
            <h2>Anniversaries</h2>
            <h2>Graduations</h2>
            <h2>Birthdays</h2>
            <h2>Reunions</h2>
            <h2>Showers</h2>
        </div>

        {{-- Product Card --}}
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8">
            {{-- @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach --}}
        </div>
    </section>


    {{-- CALENDAR de fechas disponibles --}}
    <section>
        <div>
            @livewire('availability-calendar')
        </div>
    </section>


    {{-- Location --}}
    <section class="mt-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-x-6 gap-y-8">

            <div class="col-span-1 mt-12 opacity-75 hover:opacity-100">
                <img src="{{ asset('img/home/c31696d0-c404-4016-8c1f-d8b3744748bb.jpg') }}" class="rounded-md" style="width:100%">
            </div>

            <div class="col-span-2">
                <div class="ml-24 mb-4">
                    <h3 class="">WHERE I WORK</h3>
                    <p class=""><em>I'd love your visit!</em></p>
                </div>

                <div class="ml-24">
                    <h3 class="">THE PALACE HALL</h3>
                    <p class="">3001 South 144th Street, Omaha, NE 68144</p>
                </div>

                <i class="far fa-map-marked hover:text-neutral-800 text-3xl mr-6"></i>
                Chicago, Nebraska, Iowa, Kansas, Missouri, Miami, South Dakota, US.<br>

                <i class="fa fa-phone fa-fw hover:text-neutral-800 text-3xl mr-6"></i> Phone: +00
                308.746.4108 / 402.884.9950<br>

                <i class="fa fa-envelope fa-fw hover:text-neutral-800 text-3xl mr-6 mb-4"></i> Email:
                thepalace15@gmail.com<br>

                {{-- <p>Swing by for a cup of <i class="fa fa-coffee"></i>, or leave me a note</p> --}}

            </div>

        </div>
    </section>


    {{-- SECCTION 5 --}}
    {{-- MASTER CLASS - PARALLAX EFFECT - (bg-fixed bg-center bg-no-repeat bg-cover)
                                         min-h-screen - OCUPA TODA LA ALTURA DE PANTALLA
                                         opacity-75 - Detremina la opacity Inicial
                                         hover:opacity-100 - Elimina el opacity --}}

    {{-- Imagen --}}
    <section class="mt-16 opacity-75 relative bg-cover bg-center bg-no-repeat hover:opacity-100"
        style="background-image: url('{{ asset('img/home/DSC_3042.jpg') }}')">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-48">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white text-bold text-6xl py-6 justify-center font-Playfair Display SC">Working with
                    Best
                    Wedding planners</h1>
                <h1 class="text-white text-bold text-4xl">
                    Means
                </h1>
                <p class="text-white font-bold text-lg mt-2 mb-4 backdrop-brightness-5">
                    Easy Access to Decorating Experts Ensuring Quality Outputs from Concept to Completion
                </p>

            </div>
        </div>
    </section>


    {{-- SECCTION 4 - SPECIALS - Banda OCULTADA Contenido Specials of the week --}}
    <section class="my-16" style="display:none">
        <h1 class="text-gray-600 text-center text-3xl mb-6 font-bold" style="font-family:Montserrat">SPECIALS OF THE
            MONTH</h1>
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <a href="#"><img class="rounded-lg lg:h-60 w-full object-cover"
                            src="{{ asset('img/home/web_coupon_001.jpg') }}" alt=""></a>

                    <header class="mt-4">
                        <a href="#">
                            <h1 class="text-center text-xl text-gray-700 font-bold">$500 OFF on Privated Collection
                            </h1>
                        </a>
                    </header>

                    <a href="#">
                        <p>Obten un coupon de 500dll en la compra de un vestido de la collection privada, incluyendo la
                            collection Dubai.
                            La collection estara disponible al publico,
                            este evento seran todos los dias del mes de febrero en Oakview Mall.
                            Solamente se puede
                            aplicar un solo coupon a la vez, por producto.
                        </p>
                    </a>

                </figure>
            </article>

            <article>
                <figure>
                    <img class="rounded-lg h-60 w-full object-cover" src="{{ asset('img/home/web_specials_002.jpg') }}"
                        alt="">
                    <header class="mt-4">
                        <a href="#">
                            <h1 class="text-center text-xl text-gray-700 font-bold">$300.00 OFF Any quinceañera dress
                            </h1>
                        </a>
                    </header>
                    <a href="#">
                        <p> Coupon $300dll, cualquier vestido de quinceañera, que no sea de la collection privada, el
                            espcial
                            tendra lugar en todas las tiendas, todo el mes de febrero
                            solo presenta este
                            anuncio a la tienda, para hacerlo valido. Solamente se puede aplicar un solo coupon a la
                            vez, por producto.
                        </p>
                    </a>

                </figure>
            </article>

            <article>
                <figure>
                    <img class="rounded-lg h-60 w-full object-cover"
                        src="{{ asset('img/home/web_coupon_damas_003.jpg') }}" alt="">
                    <header class="mt-2">
                        <h1 class="text-center text-xl text-gray-700 font-bold">$50.00 OFF Any damas dress, for 5 o
                            more
                        </h1>
                    </header>
                    <p>Pudes obtener un coupon de $50.00 de descuento en cualquier vestido de damas, cuando pones una
                        orden
                        de un grupo igual o mayor a 5 piezas, Valido: todo el mes de febrero, en cualquiera
                        de nuestras sucursales, solo presenta este
                        anuncio a la tienda, para hacerlo valido. Solamente se puede aplicar un solo coupon a la vez,
                        por producto.
                    </p>
                </figure>
            </article>


        </div>
    </section>


    {{-- Footer --}}
    <section>
        <!-- component -->
        <div class="flex items-end w-full min-h-screen bg-white">

            <footer class="w-full text-gray-700 bg-gray-100 body-font">
                <div
                    class="container flex flex-col flex-wrap px-5 py-24 mx-auto md:items-center lg:items-start md:flex-row md:flex-no-wrap">
                    <div class="flex-shrink-0 w-64 mx-auto text-center md:mx-0 md:text-left">
                        {{-- <a
                            class="flex items-center justify-center font-medium text-gray-900 title-font md:justify-start">
                            <svg class="w-auto h-5 text-gray-900 fill-current" viewBox="0 0 202 69"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M57.44.672s6.656 1.872 6.656 5.72c0 0-1.56 2.6-3.744 6.552 8.424 1.248 16.744 1.248 23.816-1.976-1.352 7.904-12.688 8.008-26.208 6.136-7.696 13.624-19.656 36.192-19.656 42.848 0 .416.208.624.52.624 4.576 0 17.888-14.352 21.112-18.824 1.144-1.456 4.264.728 3.12 2.392C56.608 53.088 42.152 69 36.432 69c-4.472 0-8.216-5.928-8.216-10.4 0-6.552 11.752-28.08 20.28-42.952-9.984-1.664-20.176-3.64-27.976-3.848-13.936 0-16.64 3.536-17.576 6.032-.104.312-.52.52-.832.312-3.744-7.072-1.456-14.56 14.144-14.56 9.36 0 22.048 4.576 34.944 7.592C54.736 5.04 57.44.672 57.44.672zm46.124 41.08c1.144-1.456 4.264.728 3.016 2.392C100.236 53.088 85.78 69 80.06 69c-4.576 0-8.32-5.928-8.32-10.4v-.208C67.58 64.32 63.524 69 61.34 69c-4.472 0-8.944-4.992-8.944-11.856 0-10.608 15.704-33.072 24.96-33.072 4.992 0 7.384 2.392 8.528 4.576l2.6-4.576s6.656 1.976 6.656 5.824c0 0-13.312 24.336-13.312 30.056 0 .208 0 .624.52.624 4.472 0 17.888-14.352 21.216-18.824zm-40.56 18.72c2.184 0 11.752-13.312 17.368-22.048l4.16-7.488c-8.008-7.904-27.248 29.536-21.528 29.536zm57.564-38.168c-2.184 0-4.992-2.808-4.992-4.784 0-2.912 5.824-14.872 7.28-14.872 2.6 0 6.136 2.808 6.136 6.344 0 2.08-7.176 12.064-8.424 13.312zm-17.68 46.592c-4.472 0-8.216-5.928-8.216-10.4 0-6.656 16.744-34.528 16.744-34.528s6.552 1.976 6.552 5.824c0 0-13.312 24.336-13.312 30.056 0 .208.104.624.624.624 4.472 0 17.888-14.352 21.112-18.824 1.144-1.456 4.264.728 3.12 2.392-6.448 8.944-20.904 24.856-26.624 24.856zM147.244.672s6.656 1.872 6.656 5.72c0 0-25.792 43.784-25.792 53.56 0 .416.208.624.52.624 4.576 0 17.888-14.352 21.112-18.824 1.144-1.456 4.264.728 3.12 2.392C146.412 53.088 131.956 69 126.236 69c-4.472 0-8.216-5.928-8.216-10.4 0-10.4 29.224-57.928 29.224-57.928zM169.7 60.16c3.848-2.392 7.904-6.864 10.816-10.92 6.656-9.464 11.544-20.696 10.504-27.352-.312-3.432-.104-4.056 3.12-2.704 5.2 2.392 11.336 8.632 2.184 22.88-5.2 8.008-12.48 15.288-19.344 19.76-2.704 1.768-6.344 3.328-9.984 4.16-.52.416-1.04.728-1.456.936-1.872 1.352-4.264 2.08-7.592 2.08-14.664 0-16.848-12.272-16.848-16.016 0-2.392 3.224-4.68 4.784-3.744.208.104.312.416.312.624 0 2.808 1.872 13.104 9.984 13.104 7.904 0 3.432-18.304 2.288-27.144-1.456 2.288-3.432 4.992-5.616 8.32-2.6 3.744-5.72 1.456-4.784 0 5.824-8.424 9.152-13.832 11.856-18.616 1.248-2.08 3.328-3.328 6.448-3.328 2.704 0 5.824 3.016 6.864 4.784.312.52 0 1.04-.52 1.144a5.44 5.44 0 00-4.368 5.408c0 6.968 2.6 17.16 1.664 24.856l-.312 1.768z"
                                    fill-rule="nonzero" />
                            </svg>
                        </a> --}}
                        <p class="font-bold text-xl">THE PALACE</p>
                        <p class="mt-2 text-sm text-gray-500">Design, Code and Ship!</p>
                        <div class="mt-4">
                            <span class="inline-flex justify-center mt-2 sm:ml-auto sm:mt-0 sm:justify-start">
                                <a href="https://www.facebook.com/profile.php?id=100004629788695"
                                    class="text-gray-500 cursor-pointer hover:text-gray-700">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" class="w-8 h-8" viewBox="0 0 24 24">
                                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                    </svg>
                                </a>
                                <a class="ml-3 text-gray-500 cursor-pointer hover:text-gray-700">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" class="w-8 h-8" viewBox="0 0 24 24">
                                        <path
                                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                        </path>
                                    </svg>
                                </a>
                                <a class="ml-3 text-gray-500 cursor-pointer hover:text-gray-700">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="w-8 h-8"
                                        viewBox="0 0 24 24">
                                        <rect width="20" height="20" x="2" y="2" rx="5"
                                            ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                                    </svg>
                                </a>
                                <a class="ml-3 text-gray-500 cursor-pointer hover:text-gray-700">
                                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="0" class="w-5 h-5"
                                        viewBox="0 0 24 24">
                                        <path stroke="none"
                                            d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                                        </path>
                                        <circle cx="4" cy="4" r="2" stroke="none"></circle>
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-wrap flex-grow mt-10 -mb-10 text-center md:pl-20 md:mt-0 md:text-left">
                        <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                            <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 uppercase title-font">
                                About</h2>
                            <nav class="mb-10 list-none">
                                <li class="mt-3">
                                    <a class="text-gray-500 cursor-pointer hover:text-gray-900">Company</a>
                                </li>
                                <li class="mt-3">
                                    <a class="text-gray-500 cursor-pointer hover:text-gray-900">Careers</a>
                                </li>
                                <li class="mt-3">
                                    <a class="text-gray-500 cursor-pointer hover:text-gray-900">Blog</a>
                                </li>
                            </nav>
                        </div>
                        <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                            <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 uppercase title-font">
                                Support</h2>
                            <nav class="mb-10 list-none">
                                <li class="mt-3">
                                    <a class="text-gray-500 cursor-pointer hover:text-gray-900">Contact Support</a>
                                </li>
                                <li class="mt-3">
                                    <a class="text-gray-500 cursor-pointer hover:text-gray-900">Help Resources</a>
                                </li>
                                <li class="mt-3">
                                    <a class="text-gray-500 cursor-pointer hover:text-gray-900">Release Updates</a>
                                </li>
                            </nav>
                        </div>
                        <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                            <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 uppercase title-font">
                                Platform
                            </h2>
                            <nav class="mb-10 list-none">
                                <li class="mt-3">
                                    <a class="text-gray-500 cursor-pointer hover:text-gray-900">Terms &amp; Privacy</a>
                                </li>
                                <li class="mt-3">
                                    <a class="text-gray-500 cursor-pointer hover:text-gray-900">Pricing</a>
                                </li>
                                <li class="mt-3">
                                    <a class="text-gray-500 cursor-pointer hover:text-gray-900">FAQ</a>
                                </li>
                            </nav>
                        </div>
                        <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                            <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 uppercase title-font">
                                Contact</h2>
                            <nav class="mb-10 list-none">
                                <li class="mt-3">
                                    <a class="text-gray-500 cursor-pointer hover:text-gray-900">Send a Message</a>
                                </li>
                                <li class="mt-3">
                                    <a class="text-gray-500 cursor-pointer hover:text-gray-900">Request a Quote</a>
                                </li>
                                <li class="mt-3">
                                    <a class="text-gray-500 cursor-pointer hover:text-gray-900">+308-746-4108</a>
                                </li>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-300">
                    <div class="container px-5 py-4 mx-auto">
                        <p class="text-sm text-gray-700 capitalize xl:text-center">Nucleus-Technologies © 2024 All
                            rights reserved </p>
                        <p class="text-sm text-gray-700 capitalize lg:text-center">The Palace Hall is a Trademark with
                            Copyright 2024 The Palace Hall. </p>
                    </div>
                </div>
            </footer>

        </div>
    </section>

</x-app-layout>
