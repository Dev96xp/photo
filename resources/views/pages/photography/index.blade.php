<x-app-layout>

    {{-- USO: GALLERIA DE FOTOS PARA LA PAGINA DE FOTOGRAFIA, (ES LA CABECERA DE LA PAGINA DE FOTOGRAFIA) --}}
    {{-- MASTER CLASS - PARALLAX EFFECT - (bg-fixed bg-center bg-no-repeat bg-cover)
                                         min-h-screen - OCUPA TODA LA ALTURA DE PANTALLA
                                         opacity-75 - Detremina la opacity Inicial
                                         hover:opacity-100 - Elimina el opacity --}}


    <div role="main">

        {{-- Section 1 - Carousel --}}
        <section style="{{ $active1 == 'ACTIVE' ? '' : 'display:none' }}">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
                <ol class="carousel-indicators">
                    @if ($galleryOfCarouselPrincipal)
                        {{-- @foreach ($sectionxes as $section) --}}
                        @foreach ($galleryOfCarouselPrincipal as $image)
                            @if ($loop->first)
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            @else
                                <li data-target="#myCarousel" data-slide-to="{{ $image->id }}"></li>
                            @endif
                        @endforeach
                        {{-- @endforeach --}}
                    @endif
                </ol>

                <div class="carousel-inner">

                    @if ($galleryOfCarouselPrincipal)
                        {{-- @foreach ($sectionxes as $section) --}}
                        @foreach ($galleryOfCarouselPrincipal as $image)
                            <div
                                class="carousel-item @if ($loop->first) active @endif max-h-80 lg:max-h-none w-full">
                                {{-- Determina la altura segun el dispositivo (max-h-80 lg:max-h-none) --}}

                                <img class="bg-cover w-full" src="{{ Storage::url($image->url) }}"
                                    alt="{{ $image->id }}">

                                <div class="container">
                                    <div class="carousel-caption text-left">
                                        <h1 class="text-4xl lg:text-6xl mb-1 font-extrabold"
                                            style="font-family: Montserrat">
                                            {{ $business->name }}</h1>
                                        <p class="mb-2">{{ $business->slogan }}
                                        <p class="mb-2">{{ $business->city }}, {{ $business->state }}
                                        </p>

                                        @auth
                                        @else
                                            <p><a href="{{ route('register') }}" class="btn btn-lg btn-gray" href="#"
                                                    role="button">Sign up
                                                    today</a></p>
                                        @endauth

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- @endforeach  --}}
                    @endif

                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>


        {{-- SECCTION 2 - Articles - Contenido con 4 articulos --}}
        <section class="mt-6" style="{{ $active2 == 'ACTIVE' ? '' : 'display:none' }}">
            {{-- <h1 class="text-gray-800 text-center text-4xl mb-6 font-bold"
                style="my-6 font-family: proxima-nova, sans-serif;font-weight: 800;font-style: normal">
                ---- nada todavia----
            </h1> --}}

            <div {{-- max-w-7xl --}}
                class="w-full mx-auto px-3 sm:px-4 lg:px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-8">
                {{-- ARTICULO 1 --}}
                <article>
                    <figure>

                        <a href="gallery"><img class="rounded-sm lg:h-80 w-full object-cover opacity-100"
                                src="{{ Storage::url($artp1) }}" alt="article1"></a>

                        <header class="mt-2">
                            <a href="gallery">
                                <h1 class="text-center text-xl text-gray-700">{{ $artp1_name }}</h1>
                            </a>
                        </header>

                        <a href="gallery" class="mt-2">
                            <p>{{ $artp1_desc }}</p>
                        </a>

                    </figure>
                </article>

                {{-- ARTICULO 2 --}}
                <article>
                    <figure>
                        <img class="rounded-sm lg:h-80 w-full object-cover opacity-100"
                            src="{{ Storage::url($artp2) }}" alt="article2">
                        <header class="mt-2">
                            <a href="#">
                                <h1 class="text-center text-xl text-gray-700">{{ $artp2_name }}</h1>
                            </a>
                        </header>
                        <a href="#" class="mt-2">
                            <p>{{ $artp2_desc }}</p>
                        </a>

                    </figure>
                </article>

                {{-- ARTICULO 3 --}}
                <article>
                    <figure>
                        <a href="gallery">
                            <img class="rounded-sm lg:h-80 w-full object-cover opacity-100"
                                src="{{ Storage::url($artp3) }}" alt="article3">
                        </a>
                        <header class="mt-2">
                            <a href="gallery">
                                <h1 class="text-center text-xl text-gray-700">{{ $artp3_name }}</h1>
                            </a>
                        </header>
                        <a href="gallery" class="mt-2">
                            <p>{{ $artp3_desc }}</p>
                        </a>
                    </figure>
                </article>

                {{-- ARTICULO 4 --}}
                <article>
                    <figure>
                        {{-- <img class="rounded-xl lg:h-40 w-full object-cover opacity-75"
                        src="{{ asset('img/home/DSC_3035.jpg') }}" alt=""> --}}
                        <img class="rounded-sm lg:h-80 w-full object-cover opacity-100"
                            src="{{ Storage::url($artp4) }}" alt="article4">

                        <header class="mt-2">
                            <h1 class="text-center text-xl text-gray-700">{{ $artp4_name }}</h1>
                        </header>
                        <p>{{ $artp4_desc }}</p>

                        <p>{{ $business->name }}</p>
                        <p>{{ $business->phone }}</p>
                        <p>{{ $business->email }}</p>
                    </figure>
                </article>
            </div>
        </section>

        {{-- Section 3 - ParallaxImage1 --}}
        <div style="{{ $active3 == 'ACTIVE' ? '' : 'display:none' }}">
            <section class="mt-16 opacity-75 relative bg-fixed bg-cover bg-center bg-no-repeat hover:opacity-100"
                style="background-image: url('{{ Storage::url($parallaxImage1) }}')">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-48">
                    <div class="w-full md:w-3/4 lg:w-1/2">
                        <h1 class="text-white text-bold text-6xl py-2 justify-center font-Playfair Display SC">
                            {{ $parallaxImage1_name }}</h1>
                        <p class="text-xl lg:text-2xl text-gray-400">{{ $parallaxImage1_desc }}</p>

                    </div>
                </div>
            </section>
        </div>

        {{-- Section 4 - Blogs --}}
        <section style="{{ $active4 == 'ACTIVE' ? '' : 'display:none' }}">
            <div class="container marketing">

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-2xl mb-2"><span
                                class="text-muted">{{ $blog1p_name }}</span>
                        </h2>
                        <p class="lead">{{ $blog1p_desc }}</p>
                    </div>
                    <div class="col-md-5">
                        <img class="featurette-image img-fluid mx-auto" src="{{ Storage::url($blog1p) }}"
                            alt="blog1p">
                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                        <h2 class="featurette-heading text-2xl mb-2"><span class="text-muted">
                                {{ $blog2p_name }}</span></h2>
                        <p class="lead">{{ $blog2p_desc }}</p>
                    </div>
                    <div class="col-md-5 order-md-1">
                        <img class="featurette-image img-fluid mx-auto" src="{{ Storage::url($blog2p) }}"
                            alt="blog2p">
                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-2xl mb-2"><span
                                class="text-muted">{{ $blog3p_name }}</span>
                        </h2>
                        <p class="lead">{{ $blog3p_desc }}</p>
                    </div>
                    <div class="col-md-5">
                        <img class="featurette-image img-fluid mx-auto" src="{{ Storage::url($blog3p) }}"
                            alt="blog3p">
                    </div>
                </div>

                <hr class="featurette-divider">

                <!-- /END THE FEATURETTES -->

            </div><!-- /.container -->

        </section>

        {{-- Section 5 - Videos --}}
        <section style="{{ $active5 == 'ACTIVE' ? '' : 'display:none' }}">
            <div class="container marketing">

                <!-- START THE FEATURETTES -->

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7">
                        <h1 class="featurette-heading text-2xl mb-2">Capturing <span class="text-muted">Moments on
                                Video</span></h1>
                        <p class="lead">"Para nosotros el detalle es lo que cuenta, sobre todo hacer lucir tu hermoso
                            vestido y tenerlo
                            en video para verlo y volverlo a ver cuantas veces quieras, por eso es muy importante usar
                            lo
                            ultimo tecnologia
                            para la filmacion"</p>
                    </div>
                    <div class="col-md-5">

                        {{-- Add controls=0 to NOT display controls in the video player.
                    controls=0 - Player controls does not display.
                    controls=1 (default) - Player controls is displayed. --}}

                        <iframe class="w-full h-96" src="https://www.youtube.com/embed/z1pbhHgB79Q" title="promo"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>


                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                        <h2 class="featurette-heading text-2xl mb-2">Personal<span class="text-muted"> Touch</span>
                        </h2>
                        <p class="lead">"Nos encanta la gran variedad de temas sobre quinceañeras que existen,
                            una de nuestras favoritas es la de Charro, una tradicion muy Mexicana y lucen
                            espectaculares,
                            mas cuando usamos drones para la filmacion"</p>
                    </div>

                    <div class="col-md-5 order-md-1">
                        <iframe class="w-full h-96" src="https://www.youtube.com/embed/BvG8zgC106s"
                            title="Adrianna XV" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>

                <hr class="featurette-divider">

                <!-- /END THE FEATURETTES -->

            </div>

        </section>

        {{-- Section 6 - ParallaxImage2 --}}
        <div style="{{ $active6 == 'ACTIVE' ? '' : 'display:none' }}">
            <section class="mt-16 opacity-100 relative lg:bg-fixed bg-cover bg-center bg-no-repeat hover:opacity-100"
                style="background-image: url('{{ Storage::url($parallaxImage2) }}')">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-48">
                    <div class="w-full md:w-3/4 lg:w-1/2">
                        <h1 class="text-white text-bold text-6xl py-6 justify-center font-Playfair Display SC">
                            {{ $parallaxImage2_name }}</h1>
                        <p class="text-xl lg:text-2xl text-gray-400">{{ $parallaxImage2_desc }}</p>


                    </div>
                </div>
            </section>
        </div>

        {{-- Section 7 - Contact & Footer --}}
        <section style="{{ $active7 == 'ACTIVE' ? '' : 'display:none' }}">
            @livewire('footers.footer')
        </section>


    </div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>

    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="{{ asset('js/holder.min.js') }}"></script>


</x-app-layout>
