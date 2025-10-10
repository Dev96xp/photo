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

        {{-- Section 2 - Articles --}}
        <section style="{{ $active2 == 'ACTIVE' ? '' : 'display:none' }}">
            <div class="container marketing">
                <!-- Marketing messaging and featurettes
                 ================================================== -->
                <!-- Wrap the rest of the page in another container to center all the content. -->
                <!-- Three columns of text below the carousel -->
                <div class="row">
                    <div class="col-lg-4">

                        <img class="mx-auto mb-3" src="{{ Storage::url($art1p) }}" alt="art1p" width="400"
                            height="200">
                        <h2 class="text-xl font-bold">{{ $art1p_name }}</h2>
                        <p>{{ $art1p_desc }}</p>

                        {{-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> --}}
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <img class="mx-auto mb-3" src="{{ Storage::url($art2p) }}" alt="art2p" width="400"
                            height="200">
                        <h2 class="text-xl font-bold">{{ $art2p_name }}</h2>
                        <p>{{ $art2p_desc }}</p>

                        {{-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> --}}
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <img class="mx-auto mb-3" src="{{ Storage::url($art3p) }}" alt="art3p" width="400"
                            height="200">
                        <h2 class="text-xl font-bold">{{ $art3p_name }}</h2>
                        <p>{{ $art3p_desc }}</p>
                        <p>{{ $business->name }}</p>
                        <p>{{ $business->phone }}</p>
                        <p>{{ $business->email }}</p>
                        {{-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> --}}
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
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
                        <h2 class="featurette-heading text-2xl mb-2"><span class="text-muted">{{ $blog1p_name }}</span>
                        </h2>
                        <p class="lead">{{ $blog1p_desc}}</p>
                    </div>
                    <div class="col-md-5">
                        <img class="featurette-image img-fluid mx-auto" src="{{ Storage::url($blog1p) }}"
                            alt="blog1p">
                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                        <h2 class="featurette-heading text-2xl mb-2"><span class="text-muted"> {{ $blog2p_name }}</span></h2>
                        <p class="lead">{{ $blog2p_desc}}</p>
                    </div>
                    <div class="col-md-5 order-md-1">
                        <img class="featurette-image img-fluid mx-auto" src="{{ Storage::url($blog2p) }}"
                            alt="blog2p">
                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading text-2xl mb-2"><span class="text-muted">{{ $blog3p_name }}</span>
                        </h2>
                        <p class="lead">{{ $blog3p_desc}}</p>
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
            <section class="mt-16 opacity-75 relative bg-fixed bg-cover bg-center bg-no-repeat hover:opacity-100"
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
