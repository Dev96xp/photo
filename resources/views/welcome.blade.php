<x-app-layout>

    {{-- USO: PAGINA PRINCIPAL - HOME NO 1 --}}
    {{-- RUTA: resources/views/welcome.blade.php --}}
    {{-- CONTROLADOR: app/Http/Controllers/HomeController.php --}}
    {{-- MODELO: app/Models/Sectionx.php --}}
    {{-- SEEDER: database/seeders/SectionxSeeder.php --}}

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garant:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Playfair+Display:ital,wght@0,500;0,700;1,500&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        /* ── Variables globales ── */
        :root {
            --color-dark:   #0D0D0D;
            --color-cream:  #F5F0EB;
            --color-gold:   #C9A96E;
            --color-white:  #FFFFFF;
            --color-gray:   #6B6B6B;
            --font-display: 'Playfair Display', Georgia, serif;
            --font-serif:   'Cormorant Garant', Georgia, serif;
            --font-sans:    'Montserrat', sans-serif;
        }

        body {
            background-color: var(--color-white);
            color: var(--color-dark);
            font-family: var(--font-sans);
        }

        /* ── Animaciones de scroll ── */
        .fade-up {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.9s ease, transform 0.9s ease;
        }
        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .slide-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: opacity 0.9s ease, transform 0.9s ease;
        }
        .slide-left.visible {
            opacity: 1;
            transform: translateX(0);
        }
        .slide-right {
            opacity: 0;
            transform: translateX(50px);
            transition: opacity 0.9s ease, transform 0.9s ease;
        }
        .slide-right.visible {
            opacity: 1;
            transform: translateX(0);
        }

        /* ── Línea decorativa dorada ── */
        .gold-line::after {
            content: '';
            display: block;
            width: 60px;
            height: 2px;
            background: var(--color-gold);
            margin: 16px auto 0;
        }

        /* ── Etiqueta de sección ── */
        .section-label {
            font-family: var(--font-sans);
            font-size: 0.7rem;
            letter-spacing: 0.45em;
            text-transform: uppercase;
            color: var(--color-gold);
            margin-bottom: 0.75rem;
            display: block;
        }
        .section-title {
            font-family: var(--font-display);
            font-size: clamp(1.8rem, 4vw, 3rem);
            font-weight: 600;
            color: var(--color-dark);
            line-height: 1.2;
        }

        /* ── Botón elegante ── */
        .btn-gold {
            display: inline-block;
            padding: 0.875rem 2.5rem;
            border: 1px solid var(--color-gold);
            color: var(--color-white);
            font-family: var(--font-sans);
            font-size: 0.7rem;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            text-decoration: none;
            transition: background 0.35s ease, color 0.35s ease;
        }
        .btn-gold:hover {
            background: var(--color-gold);
            color: var(--color-dark);
        }
        .btn-gold-dark {
            display: inline-block;
            padding: 0.875rem 2.5rem;
            border: 1px solid var(--color-gold);
            color: var(--color-dark);
            font-family: var(--font-sans);
            font-size: 0.7rem;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            text-decoration: none;
            transition: background 0.35s ease, color 0.35s ease;
        }
        .btn-gold-dark:hover {
            background: var(--color-gold);
            color: var(--color-white);
        }

        /* ── Divisor decorativo ── */
        .divider-gold {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 1.5rem 0;
        }
        .divider-gold::before,
        .divider-gold::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(201,169,110,0.4);
        }
        .divider-gold span {
            color: var(--color-gold);
            font-size: 0.85rem;
        }

        /* ════════════════════════════════
           SECTION 1 — HERO
        ════════════════════════════════ */
        .hero-wrap {
            position: relative;
            height: 100vh;
            min-height: 620px;
            overflow: hidden;
        }
        /* Ken Burns en la imagen de fondo */
        .hero-bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            animation: kenBurns 14s ease-in-out alternate infinite;
        }
        @keyframes kenBurns {
            0%   { transform: scale(1); }
            100% { transform: scale(1.07); }
        }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                160deg,
                rgba(0,0,0,0.08) 0%,
                rgba(0,0,0,0.55) 60%,
                rgba(0,0,0,0.82) 100%
            );
        }
        .hero-content {
            position: absolute;
            bottom: 10%;
            left: 5%;
            right: 5%;
        }
        @media (min-width: 1024px) {
            .hero-content { bottom: 12%; left: 8%; right: 38%; }
        }
        /* Animaciones escalonadas del hero */
        @keyframes heroUp {
            from { opacity: 0; transform: translateY(32px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .ha1 { animation: heroUp 1s ease 0.3s both; }
        .ha2 { animation: heroUp 1s ease 0.6s both; }
        .ha3 { animation: heroUp 1s ease 0.9s both; }
        .ha4 { animation: heroUp 1s ease 1.2s both; }
        .ha5 { animation: heroUp 1s ease 1.5s both; }

        /* Scroll indicator */
        .scroll-hint {
            position: absolute;
            bottom: 2.5rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }
        .scroll-hint span {
            font-family: var(--font-sans);
            font-size: 0.6rem;
            letter-spacing: 0.35em;
            color: rgba(255,255,255,0.55);
            text-transform: uppercase;
        }
        .scroll-line {
            width: 1px;
            height: 48px;
            background: linear-gradient(to bottom, rgba(255,255,255,0.55), transparent);
            animation: pulse 2.2s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 0.3; }
            50%       { opacity: 1; }
        }

        /* ════════════════════════════════
           SECTION 2 — VIDEO
        ════════════════════════════════ */
        .video-wrap {
            position: relative;
            overflow: hidden;
            background: var(--color-dark);
        }
        .video-wrap video {
            width: 100%;
            height: 100vh;
            object-fit: cover;
            display: block;
        }
        .video-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.38);
            display: flex;
            align-items: flex-end;
            padding: 4rem 2rem;
        }
        @media (min-width: 1024px) {
            .video-overlay { padding: 6rem 8rem; }
        }

        /* ════════════════════════════════
           SECTION 3 — GALERÍA CARDS
        ════════════════════════════════ */
        .gallery-card {
            position: relative;
            overflow: hidden;
            background: #111;
            cursor: pointer;
        }
        .gallery-card img {
            width: 100%;
            height: 360px;
            object-fit: cover;
            display: block;
            transition: transform 0.75s cubic-bezier(0.25,0.46,0.45,0.94),
                        opacity 0.75s ease;
        }
        @media (min-width: 1024px) {
            .gallery-card img { height: 440px; }
        }
        .gallery-card:hover img {
            transform: scale(1.09);
            opacity: 0.65;
        }
        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.78) 0%, transparent 55%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 1.75rem;
            transition: background 0.4s ease;
        }
        .gallery-card:hover .gallery-overlay {
            background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.15) 100%);
        }
        .gallery-line {
            width: 0;
            height: 1px;
            background: var(--color-gold);
            margin-bottom: 0.6rem;
            transition: width 0.45s ease;
        }
        .gallery-card:hover .gallery-line { width: 44px; }
        .gallery-title {
            font-family: var(--font-display);
            font-size: 1.4rem;
            color: var(--color-white);
            margin-bottom: 0.2rem;
        }
        .gallery-desc {
            font-family: var(--font-sans);
            font-size: 0.78rem;
            color: rgba(255,255,255,0.72);
            letter-spacing: 0.03em;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.4s ease 0.1s, transform 0.4s ease 0.1s;
        }
        .gallery-card:hover .gallery-desc {
            opacity: 1;
            transform: translateY(0);
        }

        /* ════════════════════════════════
           SECTION 4 — SERVICIOS
        ════════════════════════════════ */
        .service-card {
            border: 1px solid rgba(201,169,110,0.28);
            padding: 2.5rem 1.75rem;
            text-align: center;
            background: var(--color-white);
            transition: border-color 0.35s ease,
                        transform 0.35s ease,
                        box-shadow 0.35s ease;
        }
        .service-card:hover {
            border-color: var(--color-gold);
            transform: translateY(-8px);
            box-shadow: 0 24px 48px rgba(0,0,0,0.07);
        }
        .service-icon {
            font-size: 1.8rem;
            color: var(--color-gold);
            margin-bottom: 1.25rem;
        }
        .service-title {
            font-family: var(--font-display);
            font-size: 1.25rem;
            color: var(--color-dark);
            margin-bottom: 0.75rem;
        }
        .service-desc {
            font-size: 0.85rem;
            color: var(--color-gray);
            line-height: 1.75;
        }

        /* ════════════════════════════════
           SECTION 5 & 8 — PARALLAX
        ════════════════════════════════ */
        .parallax-section {
            position: relative;
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 75vh;
            display: flex;
            align-items: center;
        }
        @media (max-width: 768px) {
            .parallax-section { background-attachment: scroll; }
        }
        .parallax-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.48);
        }
        .parallax-content {
            position: relative;
            z-index: 1;
            padding: 5rem 2rem;
        }
        @media (min-width: 1024px) {
            .parallax-content { padding: 8rem; }
        }

        /* ════════════════════════════════
           SECTION 7 — UBICACIÓN
        ════════════════════════════════ */
        .location-img {
            width: 100%;
            height: 480px;
            object-fit: cover;
            display: block;
            filter: grayscale(15%);
            transition: filter 0.5s ease;
        }
        .location-img:hover { filter: grayscale(0%); }
        .contact-row {
            display: flex;
            align-items: flex-start;
            gap: 0.85rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: var(--color-gray);
        }
        .contact-row i {
            color: var(--color-gold);
            margin-top: 3px;
            width: 16px;
            flex-shrink: 0;
        }

        /* ════════════════════════════════
           SECTION 9 — ESPECIALES
        ════════════════════════════════ */
        .special-card { }
        .special-card-img-wrap { overflow: hidden; }
        .special-card-img-wrap img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            display: block;
            transition: transform 0.6s ease;
        }
        .special-card-img-wrap:hover img { transform: scale(1.06); }
        .special-body { padding: 1.5rem 0; }
        .special-tag {
            font-size: 0.65rem;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: var(--color-gold);
            display: block;
            margin-bottom: 0.5rem;
        }
        .special-title {
            font-family: var(--font-display);
            font-size: 1.25rem;
            color: var(--color-dark);
            margin-bottom: 0.5rem;
        }
        .special-desc {
            font-size: 0.85rem;
            color: var(--color-gray);
            line-height: 1.7;
        }
        .link-gold {
            display: inline-block;
            margin-top: 1rem;
            font-size: 0.7rem;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: var(--color-gold);
            border-bottom: 1px solid var(--color-gold);
            padding-bottom: 2px;
            text-decoration: none;
            transition: opacity 0.3s ease;
        }
        .link-gold:hover { opacity: 0.7; }

        /* ════════════════════════════════
           SECTION 10 — FOOTER
        ════════════════════════════════ */
        .footer-dark {
            background: var(--color-dark);
            color: var(--color-white);
        }
        .footer-heading {
            font-family: var(--font-sans);
            font-size: 0.65rem;
            letter-spacing: 0.4em;
            text-transform: uppercase;
            color: var(--color-gold);
            margin-bottom: 1.25rem;
        }
        .footer-link {
            display: block;
            font-size: 0.85rem;
            color: rgba(255,255,255,0.45);
            text-decoration: none;
            margin-bottom: 0.65rem;
            transition: color 0.3s ease;
        }
        .footer-link:hover { color: var(--color-gold); }
        .footer-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border: 1px solid rgba(255,255,255,0.18);
            border-radius: 50%;
            color: rgba(255,255,255,0.55);
            margin-right: 0.5rem;
            transition: border-color 0.3s ease, color 0.3s ease;
            text-decoration: none;
        }
        .footer-social a:hover {
            border-color: var(--color-gold);
            color: var(--color-gold);
        }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.07);
            padding: 1.5rem 1.5rem;
            font-size: 0.75rem;
            color: rgba(255,255,255,0.28);
        }
    </style>


    {{-- ════════════════════════════════════════════════════════════
         SECTION 1 — Hero principal con Ken Burns
    ════════════════════════════════════════════════════════════ --}}
    <section style="{{ $active1 == 'ACTIVE' ? '' : 'display:none' }}">
        <div class="hero-wrap">

            {{-- Imagen con efecto Ken Burns --}}
            <div class="hero-bg"
                 style="background-image: url('{{ Storage::url($mainImage) }}')"></div>

            {{-- Gradiente oscuro --}}
            <div class="hero-overlay"></div>

            {{-- Texto animado --}}
            <div class="hero-content">
                <p class="section-label ha1" style="color: var(--color-gold);">
                    Fine Art Photography
                </p>
                <h1 class="ha2"
                    style="font-family: var(--font-display);
                           font-size: clamp(2.8rem, 7vw, 6.5rem);
                           font-weight: 700;
                           color: var(--color-white);
                           line-height: 1.05;
                           margin-bottom: 1rem;">
                    {{ $business->name }}
                </h1>
                <p class="ha3"
                   style="font-family: var(--font-serif);
                          font-size: clamp(1rem, 2.5vw, 1.5rem);
                          font-style: italic;
                          color: rgba(255,255,255,0.82);
                          margin-bottom: 1rem;">
                    {{ $business->slogan }}
                </p>
                <p class="ha4"
                   style="font-size: 0.85rem;
                          color: rgba(255,255,255,0.62);
                          line-height: 1.75;
                          max-width: 420px;
                          margin-bottom: 2.5rem;">
                    {{ $business->description }}
                </p>
                <a href="gallery" class="btn-gold ha5">Ver Portafolio</a>
            </div>

            {{-- Scroll indicator --}}
            <div class="scroll-hint">
                <span>Scroll</span>
                <div class="scroll-line"></div>
            </div>

        </div>
    </section>


    {{-- ════════════════════════════════════════════════════════════
         SECTION 2 — Video cinematográfico
    ════════════════════════════════════════════════════════════ --}}
    <section style="{{ $active2 == 'ACTIVE' ? '' : 'display:none' }}" class="video-wrap">
        <video autoplay loop muted playsinline>
            <source src="/img/video/morilee.mp4" type="video/mp4">
        </video>
        <div class="video-overlay">
            <div>
                <p class="section-label fade-up">Momentos que perduran</p>
                <h2 class="fade-up"
                    style="font-family: var(--font-display);
                           font-size: clamp(2.2rem, 6vw, 5.5rem);
                           color: var(--color-white);
                           line-height: 1.05;">
                    {{ $business->name }}
                </h2>
                <p class="fade-up"
                   style="font-family: var(--font-serif);
                          font-size: clamp(1rem, 2vw, 1.4rem);
                          font-style: italic;
                          color: rgba(255,255,255,0.78);
                          margin-top: 0.75rem;">
                    {{ $business->slogan }}
                </p>
            </div>
        </div>
    </section>


    {{-- ════════════════════════════════════════════════════════════
         SECTION 3 — Galería de categorías
    ════════════════════════════════════════════════════════════ --}}
    <section class="py-24 px-4 sm:px-6 lg:px-16"
             style="{{ $active3 == 'ACTIVE' ? '' : 'display:none' }}">

        <div class="text-center mb-16 fade-up">
            <p class="section-label">Nuestro Trabajo</p>
            <h2 class="section-title gold-line">{{ $section3_note2 }}</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">

            <article class="gallery-card fade-up" style="transition-delay:.08s">
                <img src="{{ Storage::url($article1) }}" alt="{{ $name_article1 }}">
                <div class="gallery-overlay">
                    <div class="gallery-line"></div>
                    <h3 class="gallery-title">{{ $name_article1 }}</h3>
                    <p class="gallery-desc">{{ $description_article1 }}</p>
                </div>
                <a href="gallery" class="absolute inset-0" aria-label="{{ $name_article1 }}"></a>
            </article>

            <article class="gallery-card fade-up" style="transition-delay:.18s">
                <img src="{{ Storage::url($article2) }}" alt="{{ $name_article2 }}">
                <div class="gallery-overlay">
                    <div class="gallery-line"></div>
                    <h3 class="gallery-title">{{ $name_article2 }}</h3>
                    <p class="gallery-desc">{{ $description_article2 }}</p>
                </div>
                <a href="gallery" class="absolute inset-0" aria-label="{{ $name_article2 }}"></a>
            </article>

            <article class="gallery-card fade-up" style="transition-delay:.28s">
                <img src="{{ Storage::url($article3) }}" alt="{{ $name_article3 }}">
                <div class="gallery-overlay">
                    <div class="gallery-line"></div>
                    <h3 class="gallery-title">{{ $name_article3 }}</h3>
                    <p class="gallery-desc">{{ $description_article3 }}</p>
                </div>
                <a href="gallery" class="absolute inset-0" aria-label="{{ $name_article3 }}"></a>
            </article>

            <article class="gallery-card fade-up" style="transition-delay:.38s">
                <img src="{{ Storage::url($article4) }}" alt="{{ $name_article4 }}">
                <div class="gallery-overlay">
                    <div class="gallery-line"></div>
                    <h3 class="gallery-title">{{ $name_article4 }}</h3>
                    <p class="gallery-desc">{{ $description_article4 }}</p>
                </div>
                <a href="gallery" class="absolute inset-0" aria-label="{{ $name_article4 }}"></a>
            </article>

        </div>
    </section>


    {{-- ════════════════════════════════════════════════════════════
         SECTION 4 — Servicios
    ════════════════════════════════════════════════════════════ --}}
    <section class="py-24 px-4 sm:px-6 lg:px-16"
             style="background: var(--color-cream); {{ $active4 == 'ACTIVE' ? '' : 'display:none' }}">

        <div class="text-center mb-16 fade-up">
            <p class="section-label">Lo que ofrezco</p>
            <h2 class="section-title gold-line">{{ $section4_note2 }}</h2>
            @if($section4_desc)
                <p style="max-width:580px; margin:1.5rem auto 0; font-size:0.9rem;
                           color:var(--color-gray); line-height:1.85;">
                    {{ $section4_desc }}
                </p>
            @endif
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
            <div class="service-card fade-up" style="transition-delay:.08s">
                <div class="service-icon"><i class="fas fa-ring"></i></div>
                <h3 class="service-title">Bodas</h3>
                <p class="service-desc">Capturamos cada momento mágico de tu día especial con elegancia y emoción.</p>
            </div>
            <div class="service-card fade-up" style="transition-delay:.18s">
                <div class="service-icon"><i class="fas fa-star"></i></div>
                <h3 class="service-title">Quinceañeras</h3>
                <p class="service-desc">Celebramos la transición a la madurez con fotografía artística y emotiva.</p>
            </div>
            <div class="service-card fade-up" style="transition-delay:.28s">
                <div class="service-icon"><i class="fas fa-camera"></i></div>
                <h3 class="service-title">Fashion</h3>
                <p class="service-desc">Fotografía de moda con impacto visual y dirección artística de alto nivel.</p>
            </div>
            <div class="service-card fade-up" style="transition-delay:.38s">
                <div class="service-icon"><i class="fas fa-heart"></i></div>
                <h3 class="service-title">Familias</h3>
                <p class="service-desc">Momentos únicos que cuentan la historia de tu familia para siempre.</p>
            </div>
        </div>

    </section>


    {{-- ════════════════════════════════════════════════════════════
         SECTION 5 — Imagen Grande A (Parallax)
    ════════════════════════════════════════════════════════════ --}}
    <div style="{{ $active5 == 'ACTIVE' ? '' : 'display:none' }}">
        <section class="parallax-section"
                 style="background-image: url('{{ Storage::url($largeImageA) }}')">
            <div class="parallax-overlay"></div>
            <div class="parallax-content fade-up">
                <p class="section-label">Historia &amp; Emoción</p>
                <h2 style="font-family: var(--font-display);
                           font-size: clamp(2rem,5vw,4.5rem);
                           color: var(--color-white);
                           line-height: 1.1;
                           margin-bottom: 1rem;">
                    {{ $largeImageA_name }}
                </h2>
                <div class="divider-gold"><span>✦</span></div>
                <p style="font-size: 1rem;
                          color: rgba(255,255,255,0.8);
                          line-height: 1.85;
                          max-width: 500px;">
                    {{ $largeImageA_desc }}
                </p>
                <a href="gallery" class="btn-gold" style="margin-top: 2.5rem; display: inline-block;">
                    Ver Galería
                </a>
            </div>
        </section>
    </div>


    {{-- ════════════════════════════════════════════════════════════
         SECTION 6 — Calendario (Livewire)
    ════════════════════════════════════════════════════════════ --}}
    <section style="{{ $active6 == 'ACTIVE' ? '' : 'display:none' }}"
             class="py-24 px-4"
             style="background: var(--color-cream);">
        <div class="text-center mb-12 fade-up">
            <p class="section-label">Agenda tu sesión</p>
            <h2 class="section-title gold-line">Disponibilidad</h2>
        </div>
        <div class="max-w-4xl mx-auto">
            @livewire('availability-calendar')
        </div>
    </section>


    {{-- ════════════════════════════════════════════════════════════
         SECTION 7 — Ubicación y Contacto
    ════════════════════════════════════════════════════════════ --}}
    <section class="py-24"
             style="{{ $active7 == 'ACTIVE' ? '' : 'display:none' }}">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8
                    grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div class="slide-left">
                <img src="{{ Storage::url($locationImage) }}"
                     alt="Estudio"
                     class="location-img">
            </div>

            <div class="slide-right">
                <p class="section-label">Encuéntrame</p>
                <h2 class="section-title" style="margin-bottom: 1.5rem;">
                    {{ $business->name }}
                </h2>
                <div class="divider-gold" style="margin-bottom: 2rem;"><span>✦</span></div>

                <div class="contact-row">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <p>{{ $business->address }}</p>
                        <p>{{ $business->city }}, {{ $business->zip }}</p>
                        <p style="font-size:0.8rem; margin-top:0.25rem; color:#999;">
                            Chicago · Nebraska · Iowa · Kansas · Missouri · Miami · South Dakota, US
                        </p>
                    </div>
                </div>
                <div class="contact-row">
                    <i class="fas fa-phone"></i>
                    <div>
                        <p>{{ $business->phone }}</p>
                        @if($business->phone2)
                            <p>{{ $business->phone2 }}</p>
                        @endif
                    </div>
                </div>
                <div class="contact-row">
                    <i class="fas fa-envelope"></i>
                    <p>{{ $business->email }}</p>
                </div>

                <a href="gallery" class="btn-gold-dark"
                   style="margin-top: 2rem; display: inline-block;">
                    Agendar Sesión
                </a>
            </div>

        </div>
    </section>


    {{-- ════════════════════════════════════════════════════════════
         SECTION 8 — Imagen Grande B (Parallax)
    ════════════════════════════════════════════════════════════ --}}
    <div style="{{ $active8 == 'ACTIVE' ? '' : 'display:none' }}">
        <section class="parallax-section"
                 style="background-image: url('{{ Storage::url($largeImageB) }}')">
            <div class="parallax-overlay"></div>
            <div class="parallax-content fade-up"
                 style="margin-left: auto; max-width: 680px; text-align: right; padding-right: 4rem;">
                <p class="section-label" style="text-align: right;">Arte &amp; Pasión</p>
                <h2 style="font-family: var(--font-display);
                           font-size: clamp(2rem,5vw,4.5rem);
                           color: var(--color-white);
                           line-height: 1.1;
                           margin-bottom: 0.75rem;">
                    {{ $largeImageB_name }}
                </h2>
                <h3 style="font-family: var(--font-serif);
                           font-size: clamp(1rem,2.5vw,1.6rem);
                           color: var(--color-gold);
                           font-style: italic;
                           margin-bottom: 1rem;">
                    {{ $largeImageB_note }}
                </h3>
                <div class="divider-gold" style="flex-direction: row-reverse;"><span>✦</span></div>
                <p style="font-size: 1rem;
                          color: rgba(255,255,255,0.8);
                          line-height: 1.85;">
                    {{ $largeImageB_desc }}
                </p>
            </div>
        </section>
    </div>


    {{-- ════════════════════════════════════════════════════════════
         SECTION 9 — Especiales del Mes
    ════════════════════════════════════════════════════════════ --}}
    <section class="py-24 px-4 sm:px-6 lg:px-16"
             style="{{ $active9 == 'ACTIVE' ? '' : 'display:none' }}">

        <div class="text-center mb-16 fade-up">
            <p class="section-label">Ofertas Exclusivas</p>
            <h2 class="section-title gold-line">Especiales del Mes</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl mx-auto">

            <div class="special-card fade-up" style="transition-delay:.08s">
                <div class="special-card-img-wrap">
                    <img src="{{ Storage::url($special1) }}" alt="{{ $name_special1 }}">
                </div>
                <div class="special-body">
                    <span class="special-tag">Especial</span>
                    <h3 class="special-title">{{ $name_special1 }}</h3>
                    <p class="special-desc">{{ $description_special1 }}</p>
                    <a href="#" class="link-gold">Ver más</a>
                </div>
            </div>

            <div class="special-card fade-up" style="transition-delay:.18s">
                <div class="special-card-img-wrap">
                    <img src="{{ Storage::url($special2) }}" alt="{{ $name_special2 }}">
                </div>
                <div class="special-body">
                    <span class="special-tag">Especial</span>
                    <h3 class="special-title">{{ $name_special2 }}</h3>
                    <p class="special-desc">{{ $description_special2 }}</p>
                    <a href="#" class="link-gold">Ver más</a>
                </div>
            </div>

            <div class="special-card fade-up" style="transition-delay:.28s">
                <div class="special-card-img-wrap">
                    <img src="{{ Storage::url($special3) }}" alt="{{ $name_special3 }}">
                </div>
                <div class="special-body">
                    <span class="special-tag">Especial</span>
                    <h3 class="special-title">{{ $name_special3 }}</h3>
                    <p class="special-desc">{{ $description_special3 }}</p>
                    <a href="#" class="link-gold">Ver más</a>
                </div>
            </div>

        </div>
    </section>


    {{-- ════════════════════════════════════════════════════════════
         SECTION 10 — Footer elegante
    ════════════════════════════════════════════════════════════ --}}
    <section style="{{ $active10 == 'ACTIVE' ? '' : 'display:none' }}">
        <footer class="footer-dark">
            <div class="max-w-7xl mx-auto px-6 py-20">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">

                    {{-- Brand --}}
                    <div class="lg:col-span-2">
                        <p style="font-family: var(--font-display);
                                  font-size: 1.85rem;
                                  color: var(--color-white);
                                  margin-bottom: 0.4rem;">
                            {{ $business->name }}
                        </p>
                        <p style="font-family: var(--font-serif);
                                  font-style: italic;
                                  color: var(--color-gold);
                                  font-size: 1rem;
                                  margin-bottom: 1.5rem;">
                            {{ $business->slogan }}
                        </p>
                        <p style="font-size: 0.85rem;
                                  color: rgba(255,255,255,0.4);
                                  line-height: 1.85;
                                  max-width: 310px;
                                  margin-bottom: 2rem;">
                            Fotografía de arte para bodas, quinceañeras, fashion y familias.
                        </p>
                        <div class="footer-social">
                            <a href="{{ $business->link }}" aria-label="Facebook">
                                <svg fill="currentColor" class="w-4 h-4" viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                                </svg>
                            </a>
                            <a aria-label="Twitter">
                                <svg fill="currentColor" class="w-4 h-4" viewBox="0 0 24 24">
                                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
                                </svg>
                            </a>
                            <a href="{{ $business->link2 }}" aria-label="Instagram">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                     stroke-linejoin="round" stroke-width="2"
                                     class="w-4 h-4" viewBox="0 0 24 24">
                                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
                                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"/>
                                </svg>
                            </a>
                            <a href="{{ $business->link3 }}" aria-label="LinkedIn">
                                <svg fill="currentColor" class="w-4 h-4" viewBox="0 0 24 24">
                                    <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/>
                                    <circle cx="4" cy="4" r="2" stroke="none"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    {{-- Navegación --}}
                    <div>
                        <h4 class="footer-heading">Navegación</h4>
                        <a href="/" class="footer-link">Inicio</a>
                        <a href="gallery" class="footer-link">Galería</a>
                        <a href="#" class="footer-link">Servicios</a>
                        <a href="#" class="footer-link">Sobre Mí</a>
                        <a href="#" class="footer-link">Contacto</a>
                    </div>

                    {{-- Contacto --}}
                    <div>
                        <h4 class="footer-heading">Contacto</h4>
                        <p class="footer-link">{{ $business->address }}</p>
                        <p class="footer-link">{{ $business->city }}, {{ $business->zip }}</p>
                        <p class="footer-link" style="margin-top: 0.75rem;">{{ $business->phone }}</p>
                        <p class="footer-link">{{ $business->email }}</p>
                    </div>

                </div>
            </div>

            <div class="footer-bottom">
                <div class="max-w-7xl mx-auto px-6
                            flex flex-col sm:flex-row justify-between items-center gap-2">
                    <p>© {{ date('Y') }} {{ $business->name }}. Todos los derechos reservados.</p>
                    <p>Powered by Nucleus-Technologies</p>
                </div>
            </div>
        </footer>
    </section>


    {{-- ════════════════════════════════════════════════════════════
         JS — Intersection Observer para animaciones de scroll
    ════════════════════════════════════════════════════════════ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -40px 0px'
            });

            document.querySelectorAll('.fade-up, .slide-left, .slide-right')
                    .forEach(el => observer.observe(el));
        });
    </script>

</x-app-layout>
