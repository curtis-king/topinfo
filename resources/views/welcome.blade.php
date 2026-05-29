<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TOPINFO Solutions Informatiques — réseaux, maintenance, web, logiciel, sécurité et téléphonie IP à Abidjan.">
    <title>TOPINFO — Solutions Informatiques</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
</head>
<body class="font-sans antialiased bg-white text-brand-grey-dark">

    {{-- Navbar --}}
    <nav x-data="{ open: false, scrolled: false }"
         @scroll.window="scrolled = window.scrollY > 20"
         :class="scrolled ? 'bg-white/95 shadow-sm' : 'bg-white/80'"
         class="fixed w-full z-50 backdrop-blur-md border-b border-gray-100 transition-shadow duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <a href="#" class="flex items-center shrink-0">
                    <img src="{{ asset('images/logo-topinfo.png') }}" alt="TOPINFO Solutions Informatiques" class="h-14 sm:h-16 w-auto object-contain">
                </a>
                <div class="hidden lg:flex items-center gap-8 text-sm font-medium">
                    <a href="#services" class="text-brand-grey hover:text-brand-blue transition-colors">Services</a>
                    <a href="#projects" class="text-brand-grey hover:text-brand-blue transition-colors">Projets</a>
                    <a href="#partners" class="text-brand-grey hover:text-brand-blue transition-colors">Partenaires</a>
                    @if ($produits->count())
                        <a href="#products" class="text-brand-grey hover:text-brand-blue transition-colors">Produits</a>
                    @endif
                    @if ($actualities->count())
                        <a href="#actualities" class="text-brand-grey hover:text-brand-blue transition-colors">Actualités</a>
                    @endif
                    <a href="#contact" class="text-brand-grey hover:text-brand-blue transition-colors">Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-brand-blue text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-brand-blue-dark transition-colors shadow-sm">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-brand-grey hover:text-brand-blue transition-colors">Connexion</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-brand-blue text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-brand-blue-dark transition-colors shadow-sm">Espace client</a>
                            @endif
                        @endauth
                    @endif
                </div>
                <button @click="open = !open" class="lg:hidden p-2 rounded-lg hover:bg-brand-blue-light text-brand-grey-dark" aria-label="Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div x-show="open" x-transition class="lg:hidden pb-4 space-y-1 text-sm font-medium border-t border-gray-100 pt-3">
                <a href="#services" @click="open = false" class="block px-3 py-2.5 rounded-lg text-brand-grey hover:bg-brand-blue-light hover:text-brand-blue">Services</a>
                <a href="#projects" @click="open = false" class="block px-3 py-2.5 rounded-lg text-brand-grey hover:bg-brand-blue-light hover:text-brand-blue">Projets</a>
                <a href="#partners" @click="open = false" class="block px-3 py-2.5 rounded-lg text-brand-grey hover:bg-brand-blue-light hover:text-brand-blue">Partenaires</a>
                @if ($produits->count())
                    <a href="#products" @click="open = false" class="block px-3 py-2.5 rounded-lg text-brand-grey hover:bg-brand-blue-light hover:text-brand-blue">Produits</a>
                @endif
                @if ($actualities->count())
                    <a href="#actualities" @click="open = false" class="block px-3 py-2.5 rounded-lg text-brand-grey hover:bg-brand-blue-light hover:text-brand-blue">Actualités</a>
                @endif
                <a href="#contact" @click="open = false" class="block px-3 py-2.5 rounded-lg text-brand-grey hover:bg-brand-blue-light hover:text-brand-blue">Contact</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block px-3 py-2.5 text-brand-blue font-semibold">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-2.5 text-brand-grey">Connexion</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="relative min-h-screen flex items-center pt-20 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-brand-blue-light via-white to-white"></div>
        <div class="absolute top-0 right-0 w-[min(600px,80vw)] h-[min(600px,80vw)] bg-brand-blue/5 rounded-full blur-3xl -translate-y-1/4 translate-x-1/4"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-brand-grey/5 rounded-full blur-3xl translate-y-1/4 -translate-x-1/4"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="order-2 lg:order-1">
                    <p class="inline-flex items-center gap-2 px-4 py-1.5 bg-brand-blue/10 text-brand-blue text-xs font-semibold uppercase tracking-wider rounded-full mb-6">
                        <span class="w-1.5 h-1.5 rounded-full bg-brand-blue"></span>
                        Solutions Informatiques
                    </p>
                    <h1 class="text-4xl sm:text-5xl xl:text-[3.25rem] font-extrabold leading-[1.1] text-brand-grey-dark mb-6">
                        Votre partenaire<br/>
                        <span class="text-brand-blue">technologique</span>
                        <span class="text-brand-grey"> de confiance</span>
                    </h1>
                    <p class="text-lg text-brand-grey leading-relaxed mb-8 max-w-xl">
                        TOPINFO accompagne les entreprises avec des solutions complètes : infrastructures réseau, maintenance, développement web & logiciel, sécurité et téléphonie IP.
                    </p>
                    <div class="flex flex-wrap gap-4 mb-12">
                        <a href="#services" class="inline-flex items-center gap-2 bg-brand-blue text-white px-7 py-3.5 rounded-lg font-semibold hover:bg-brand-blue-dark transition-all shadow-lg shadow-brand-blue/20">
                            Nos services
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="#contact" class="inline-flex items-center gap-2 border-2 border-brand-grey/30 text-brand-grey-dark px-7 py-3.5 rounded-lg font-semibold hover:border-brand-blue hover:text-brand-blue transition-all">
                            Nous contacter
                        </a>
                    </div>
                    <div class="grid grid-cols-3 gap-6 pt-8 border-t border-gray-200">
                        <div>
                            <p class="text-2xl sm:text-3xl font-bold text-brand-blue">+10</p>
                            <p class="text-xs sm:text-sm text-brand-grey mt-1">Années d'expérience</p>
                        </div>
                        <div>
                            <p class="text-2xl sm:text-3xl font-bold text-brand-blue">6</p>
                            <p class="text-xs sm:text-sm text-brand-grey mt-1">Domaines d'expertise</p>
                        </div>
                        <div>
                            <p class="text-2xl sm:text-3xl font-bold text-brand-blue">100%</p>
                            <p class="text-xs sm:text-sm text-brand-grey mt-1">Engagement client</p>
                        </div>
                    </div>
                </div>
                <div class="order-1 lg:order-2 flex justify-center lg:justify-end">
                    <div class="relative w-full max-w-md">
                        <div class="absolute -inset-4 bg-brand-blue/10 rounded-3xl rotate-3"></div>
                        <div class="relative bg-white rounded-2xl shadow-2xl shadow-brand-blue/10 p-8 sm:p-10 border border-gray-100">
                            <img src="{{ asset('images/logo-topinfo.png') }}" alt="TOPINFO" class="w-full h-auto mx-auto">
                            <div class="mt-8 grid grid-cols-2 gap-3">
                                @foreach (['Réseaux', 'Maintenance', 'Web', 'Logiciel', 'Sécurité', 'Téléphonie IP'] as $tag)
                                    <span class="text-center text-xs font-medium px-3 py-2 rounded-lg bg-brand-blue-light text-brand-blue">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $defaultServices = [
            ['name' => 'Systèmes réseaux', 'description' => 'Conception, déploiement et administration de réseaux informatiques performants et sécurisés.', 'icon' => 'network'],
            ['name' => 'Maintenance', 'description' => 'Maintenance préventive et corrective de votre parc informatique pour une continuité optimale.', 'icon' => 'maintenance'],
            ['name' => 'Développement web', 'description' => 'Sites vitrines, applications web et plateformes sur mesure, modernes et responsives.', 'icon' => 'web'],
            ['name' => 'Logiciel', 'description' => 'Solutions logicielles adaptées à vos processus métier pour gagner en efficacité.', 'icon' => 'software'],
            ['name' => 'Sécurité & contrôle', 'description' => 'Vidéosurveillance, contrôle d\'accès et cybersécurité pour protéger vos actifs.', 'icon' => 'security'],
            ['name' => 'Téléphonie IP', 'description' => 'Solutions de communication unifiée et téléphonie IP pour connecter vos équipes.', 'icon' => 'phone'],
        ];
        $displayServices = $services->count() ? $services : collect($defaultServices);
    @endphp

    {{-- Services --}}
    <section id="services" class="py-24 lg:py-28 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-16">
                <div class="max-w-2xl">
                    <span class="text-brand-blue text-sm font-semibold uppercase tracking-wider">Expertise</span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-brand-grey-dark mt-2">Nos services</h2>
                    <p class="text-brand-grey mt-4 leading-relaxed">
                        Une offre complète pour répondre à tous vos besoins informatiques, de l'infrastructure à la communication.
                    </p>
                </div>
                <div class="hidden lg:block w-24 h-1 bg-brand-blue rounded-full"></div>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @foreach ($displayServices as $index => $service)
                @php
                    $iconKey = is_object($service) ? ($service->icon ?? 'default') : ($service['icon'] ?? 'default');
                    $serviceName = is_object($service) ? $service->name : $service['name'];
                    $serviceDesc = is_object($service) ? $service->description : $service['description'];
                @endphp
                <article class="group relative bg-white rounded-2xl border border-gray-100 p-8 hover:border-brand-blue/30 hover:shadow-xl hover:shadow-brand-blue/5 transition-all duration-300 overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-blue to-brand-blue/40 scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300"></div>
                    <div class="w-14 h-14 rounded-xl bg-brand-blue flex items-center justify-center mb-6 shadow-lg shadow-brand-blue/25 group-hover:scale-105 transition-transform">
                        @if (is_object($service) && $service->icon && !in_array($iconKey, ['network','maintenance','web','software','security','phone','default']))
                            <span class="text-2xl text-white">{!! $service->icon !!}</span>
                        @else
                            @switch($iconKey)
                                @case('network')
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                                    @break
                                @case('maintenance')
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l4.655-5.653m3.42 0a2.548 2.548 0 012.548-2.548m0 0a2.548 2.548 0 012.548 2.548"/></svg>
                                    @break
                                @case('web')
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>
                                    @break
                                @case('software')
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 7.5l3 2.25-3 2.25v4.5m6-9h3.75A2.25 2.25 0 0121 10.875v2.25A2.25 2.25 0 0118.75 15.375H12.75m-6 0H3A2.25 2.25 0 01.75 13.125v-2.25A2.25 2.25 0 013 8.625h3.75"/></svg>
                                    @break
                                @case('security')
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                                    @break
                                @case('phone')
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                                    @break
                                @default
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714a2.25 2.25 0 00.659 1.591L19 14.5M14.25 3.104c.251.023.501.05.75.082M19 14.5l-2.47 2.47a2.25 2.25 0 01-1.59.659H9.06a2.25 2.25 0 01-1.591-.659L5 14.5"/></svg>
                            @endswitch
                        @endif
                    </div>
                    <span class="text-xs font-bold text-brand-grey/60">0{{ $index + 1 }}</span>
                    <h3 class="text-xl font-bold text-brand-grey-dark mt-2 mb-3">{{ $serviceName }}</h3>
                    <p class="text-brand-grey text-sm leading-relaxed">{{ $serviceDesc }}</p>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Projects --}}
    @if ($projects->count())
    <section id="projects" class="py-24 lg:py-28 bg-brand-blue-light/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-brand-blue text-sm font-semibold uppercase tracking-wider">Portfolio</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-brand-grey-dark mt-2">Nos réalisations</h2>
                <p class="text-brand-grey mt-4 max-w-xl mx-auto">Des projets concrets qui témoignent de notre savoir-faire et de la confiance de nos clients.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($projects as $project)
                <article class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="relative h-56 overflow-hidden bg-brand-grey/10">
                        @if ($project->image_url)
                            <img src="{{ $project->image_url }}" alt="{{ $project->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-brand-blue-light to-white">
                                <svg class="w-16 h-16 text-brand-blue/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/>
                                </svg>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-grey-dark/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        @if ($project->service)
                            <span class="absolute top-4 left-4 text-xs font-semibold text-white bg-brand-blue px-3 py-1 rounded-full shadow-sm">{{ $project->service->name }}</span>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-brand-grey-dark group-hover:text-brand-blue transition-colors">{{ $project->name }}</h3>
                        <p class="text-brand-grey text-sm leading-relaxed mt-2 line-clamp-3">{{ $project->description }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @else
    <section id="projects" class="py-24 bg-brand-blue-light/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-brand-blue text-sm font-semibold uppercase tracking-wider">Portfolio</span>
            <h2 class="text-3xl font-bold text-brand-grey-dark mt-2 mb-4">Nos réalisations</h2>
            <p class="text-brand-grey max-w-md mx-auto">Nos projets seront bientôt présentés ici. Contactez-nous pour découvrir nos références.</p>
        </div>
    </section>
    @endif

    {{-- Partners --}}
    @if ($partenaires->count())
    <section id="partners" class="py-24 lg:py-28 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-brand-blue text-sm font-semibold uppercase tracking-wider">Confiance</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-brand-grey-dark mt-2">Nos partenaires</h2>
                <p class="text-brand-grey mt-4">Ils nous font confiance pour leurs solutions informatiques.</p>
            </div>

            <div class="relative">
                <div class="absolute left-0 top-0 bottom-0 w-16 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none hidden md:block"></div>
                <div class="absolute right-0 top-0 bottom-0 w-16 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none hidden md:block"></div>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                    @foreach ($partenaires as $partenaire)
                    <div class="group flex flex-col items-center justify-center p-6 sm:p-8 rounded-2xl bg-gray-50 border border-gray-100 hover:border-brand-blue/20 hover:bg-brand-blue-light/30 hover:shadow-md transition-all duration-300 min-h-[140px]">
                        @if ($partenaire->logo_url)
                            <img src="{{ $partenaire->logo_url }}" alt="{{ $partenaire->name }}" class="h-12 sm:h-14 w-auto max-w-full object-contain grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
                        @else
                            <span class="text-sm font-bold text-brand-grey text-center group-hover:text-brand-blue transition-colors">{{ $partenaire->name }}</span>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- Products --}}
    @if ($produits->count())
    <section id="products" class="py-24 lg:py-28 bg-brand-blue-light/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-brand-blue text-sm font-semibold uppercase tracking-wider">Catalogue</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-brand-grey-dark mt-2">Nos produits</h2>
                <p class="text-brand-grey mt-4 max-w-xl mx-auto">Équipements et solutions prêtes à déployer pour votre entreprise.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($produits as $produit)
                <article class="bg-white rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl hover:border-brand-blue/20 transition-all duration-300 group">
                    <div class="h-52 overflow-hidden bg-white flex items-center justify-center p-6">
                        @if ($produit->image_url)
                            <img src="{{ $produit->image_url }}" alt="{{ $produit->name }}" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-brand-blue-light rounded-xl">
                                <svg class="w-16 h-16 text-brand-blue/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6 border-t border-gray-100">
                        <h3 class="text-lg font-bold text-brand-grey-dark">{{ $produit->name }}</h3>
                        <p class="text-brand-grey text-sm leading-relaxed mt-2">{{ Str::limit($produit->description, 120) }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Actualities --}}
    @if ($actualities->count())
    <section id="actualities" class="py-24 lg:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-brand-blue text-sm font-semibold uppercase tracking-wider">Blog</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-brand-grey-dark mt-2">Actualités</h2>
                <p class="text-brand-grey mt-4 max-w-xl mx-auto">Les dernières nouvelles de TOPINFO et du monde IT.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($actualities as $actu)
                <article class="group rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300 bg-white">
                    <div class="h-48 overflow-hidden bg-brand-blue-light">
                        @if ($actu->image_url)
                            <img src="{{ $actu->image_url }}" alt="{{ $actu->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-14 h-14 text-brand-blue/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        @if ($actu->publication_date)
                            <time class="text-xs font-medium text-brand-blue">{{ \Carbon\Carbon::parse($actu->publication_date)->format('d M Y') }}</time>
                        @endif
                        <h3 class="text-lg font-bold text-brand-grey-dark mt-2 mb-2 group-hover:text-brand-blue transition-colors">{{ $actu->title }}</h3>
                        <p class="text-brand-grey text-sm leading-relaxed line-clamp-3">{{ Str::limit($actu->description ?? $actu->content, 100) }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section id="contact" class="py-24 bg-brand-blue relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-white rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <img src="{{ asset('images/logo-topinfo.png') }}" alt="TOPINFO" class="h-16 mx-auto mb-8 brightness-0 invert opacity-90">
            <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Un projet informatique ?</h2>
            <p class="text-white/80 text-lg mb-10 max-w-2xl mx-auto">
                Parlons de vos besoins en réseau, maintenance, web, logiciel, sécurité ou téléphonie IP. Notre équipe vous répond rapidement.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="mailto:contact@topinfo.com" class="inline-flex items-center gap-2 bg-white text-brand-blue px-8 py-3.5 rounded-lg font-semibold hover:bg-brand-blue-light transition-colors shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    contact@topinfo.com
                </a>
                <a href="tel:+22500000000" class="inline-flex items-center gap-2 border-2 border-white/40 text-white px-8 py-3.5 rounded-lg font-semibold hover:bg-white/10 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                    Nous appeler
                </a>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-brand-grey-dark text-gray-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-12">
                <div class="sm:col-span-2 lg:col-span-1">
                    <img src="{{ asset('images/logo-topinfo.png') }}" alt="TOPINFO" class="h-14 mb-4 brightness-0 invert opacity-95">
                    <p class="text-sm leading-relaxed text-gray-400">
                        <span class="text-brand-blue font-semibold">TOP</span><span class="text-white font-semibold">INFO</span> — Solutions informatiques complètes pour entreprises à Abidjan et en Côte d'Ivoire.
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Services</h4>
                    <ul class="space-y-2.5 text-sm">
                        @foreach ($displayServices->take(6) as $service)
                        <li>
                            <a href="#services" class="hover:text-brand-blue transition-colors">
                                {{ is_object($service) ? $service->name : $service['name'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Navigation</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="#services" class="hover:text-brand-blue transition-colors">Services</a></li>
                        <li><a href="#projects" class="hover:text-brand-blue transition-colors">Projets</a></li>
                        <li><a href="#partners" class="hover:text-brand-blue transition-colors">Partenaires</a></li>
                        <li><a href="#contact" class="hover:text-brand-blue transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Contact</h4>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 shrink-0 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            contact@topinfo.com
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 shrink-0 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Abidjan, Côte d'Ivoire
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-12 pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-sm">
                <p>&copy; {{ date('Y') }} TOPINFO Solutions Informatiques. Tous droits réservés.</p>
                <p class="text-brand-blue font-medium">Réseaux · Maintenance · Web · Logiciel · Sécurité · Téléphonie IP</p>
            </div>
        </div>
    </footer>

</body>
</html>
