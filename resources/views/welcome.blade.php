<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'TOPINFO') }} - Solutions Digitales</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
</head>
<body class="font-['Inter'] antialiased bg-white text-gray-900">

    {{-- Navbar --}}
    <nav x-data="{ open: false }" class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">T</span>
                    </div>
                    <span class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">{{ config('app.name', 'TOPINFO') }}</span>
                </div>
                <div class="hidden md:flex items-center gap-8 text-sm font-medium">
                    <a href="#services" class="text-gray-600 hover:text-blue-600 transition">Services</a>
                    <a href="#projects" class="text-gray-600 hover:text-blue-600 transition">Projets</a>
                    <a href="#partners" class="text-gray-600 hover:text-blue-600 transition">Partenaires</a>
                    <a href="#products" class="text-gray-600 hover:text-blue-600 transition">Produits</a>
                    <a href="#contact" class="text-gray-600 hover:text-blue-600 transition">Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2 rounded-full hover:shadow-lg hover:shadow-blue-500/25 transition-all">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 transition">Connexion</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2 rounded-full hover:shadow-lg hover:shadow-blue-500/25 transition-all">S'inscrire</a>
                            @endif
                        @endauth
                    @endif
                </div>
                <button @click="open = !open" class="md:hidden p-2 rounded-lg hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div x-show="open" class="md:hidden pb-4 space-y-2 text-sm font-medium">
                <a href="#services" class="block px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100">Services</a>
                <a href="#projects" class="block px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100">Projets</a>
                <a href="#partners" class="block px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100">Partenaires</a>
                <a href="#products" class="block px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100">Produits</a>
                <a href="#contact" class="block px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100">Contact</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block px-3 py-2 text-blue-600 font-semibold">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-2 text-gray-600">Connexion</a>
                        <a href="{{ route('register') }}" class="block px-3 py-2 text-blue-600 font-semibold">S'inscrire</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="relative min-h-screen flex items-center pt-16 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-indigo-50"></div>
        <div class="absolute top-20 left-10 w-72 h-72 bg-blue-200/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-indigo-200/30 rounded-full blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="inline-block px-4 py-1.5 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full mb-6">Innovation &amp; Technologie</span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-6">
                        Des solutions<br/>
                        <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">digitales sur mesure</span>
                    </h1>
                    <p class="text-lg text-gray-600 mb-8 max-w-lg">Nous transformons vos idées en solutions numériques performantes pour accélérer votre croissance.</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#services" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-3.5 rounded-full font-semibold hover:shadow-xl hover:shadow-blue-500/25 transition-all">Découvrir nos services</a>
                        <a href="#contact" class="border-2 border-gray-200 text-gray-700 px-8 py-3.5 rounded-full font-semibold hover:border-blue-600 hover:text-blue-600 transition-all">Nous contacter</a>
                    </div>
                </div>
                <div class="hidden lg:flex justify-center">
                    <div class="relative">
                        <div class="w-80 h-80 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-3xl rotate-6 shadow-2xl shadow-blue-500/20"></div>
                        <div class="absolute -top-4 -right-4 w-80 h-80 bg-gradient-to-br from-purple-500 to-pink-500 rounded-3xl -rotate-3 shadow-2xl shadow-purple-500/20 flex items-center justify-center">
                            <div class="text-white text-center">
                                <svg class="w-24 h-24 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <p class="font-semibold text-lg">TOPINFO</p>
                                <p class="text-sm opacity-80">Solutions Digitales</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Services --}}
    @if ($services->count())
    <section id="services" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-1.5 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full mb-4">Nos Services</span>
                <h2 class="text-3xl sm:text-4xl font-bold">Ce que nous faisons</h2>
                <p class="text-gray-500 mt-4 max-w-xl mx-auto">Des services complets pour accompagner votre transformation numérique.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($services as $service)
                <div class="group p-8 rounded-2xl border border-gray-100 hover:border-blue-100 hover:shadow-xl hover:shadow-blue-500/5 transition-all duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        @if ($service->icon)
                            <span class="text-3xl">{!! $service->icon !!}</span>
                        @else
                            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold mb-3">{{ $service->name }}</h3>
                    <p class="text-gray-500 leading-relaxed">{{ $service->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Projects --}}
    @if ($projects->count())
    <section id="projects" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 text-xs font-semibold rounded-full mb-4">Nos Réalisations</span>
                <h2 class="text-3xl sm:text-4xl font-bold">Projets récents</h2>
                <p class="text-gray-500 mt-4 max-w-xl mx-auto">Découvrez quelques-uns de nos projets qui ont fait la différence.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($projects as $project)
                <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="h-48 bg-gradient-to-br from-blue-100 to-indigo-100 overflow-hidden">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-16 h-16 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        @if ($project->service)
                            <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">{{ $project->service->name }}</span>
                        @endif
                        <h3 class="text-lg font-bold mt-3 mb-2">{{ $project->name }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">{{ Str::limit($project->description, 100) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Partners --}}
    @if ($partenaires->count())
    <section id="partners" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-1.5 bg-purple-100 text-purple-700 text-xs font-semibold rounded-full mb-4">Ils nous font confiance</span>
                <h2 class="text-3xl sm:text-4xl font-bold">Nos partenaires</h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 items-center">
                @foreach ($partenaires as $partenaire)
                <div class="flex justify-center p-6 grayscale hover:grayscale-0 transition-all duration-300">
                    @if ($partenaire->logo)
                        <img src="{{ asset('storage/' . $partenaire->logo) }}" alt="{{ $partenaire->name }}" class="h-12 object-contain">
                    @else
                        <span class="text-lg font-bold text-gray-400">{{ $partenaire->name }}</span>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Products --}}
    @if ($produits->count())
    <section id="products" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-1.5 bg-green-100 text-green-700 text-xs font-semibold rounded-full mb-4">Nos Produits</span>
                <h2 class="text-3xl sm:text-4xl font-bold">Découvrez nos produits</h2>
                <p class="text-gray-500 mt-4 max-w-xl mx-auto">Des solutions prêtes à l'emploi pour booster votre activité.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($produits as $produit)
                <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="h-48 bg-gradient-to-br from-green-100 to-emerald-100 flex items-center justify-center">
                        @if ($produit->image)
                            <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->name }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-20 h-20 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold mb-2">{{ $produit->name }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">{{ Str::limit($produit->description, 120) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Actualities --}}
    @if ($actualities->count())
    <section id="actualities" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-1.5 bg-orange-100 text-orange-700 text-xs font-semibold rounded-full mb-4">Actualités</span>
                <h2 class="text-3xl sm:text-4xl font-bold">Dernières nouvelles</h2>
                <p class="text-gray-500 mt-4 max-w-xl mx-auto">Restez informé des dernières tendances et innovations.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($actualities as $actu)
                <div class="rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="h-48 bg-gradient-to-br from-orange-100 to-amber-100 overflow-hidden">
                        @if ($actu->image_path)
                            <img src="{{ asset('storage/' . $actu->image_path) }}" alt="{{ $actu->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-16 h-16 text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        @if ($actu->publication_date)
                            <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($actu->publication_date)->format('d M Y') }}</span>
                        @endif
                        <h3 class="text-lg font-bold mt-2 mb-2">{{ $actu->title }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">{{ Str::limit($actu->description ?? $actu->content, 100) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section id="contact" class="py-24 bg-gradient-to-br from-blue-600 to-indigo-600 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold text-white mb-6">Prêt à démarrer votre projet ?</h2>
            <p class="text-blue-100 text-lg mb-10 max-w-2xl mx-auto">Contactez-nous dès aujourd'hui pour discuter de vos besoins et découvrir comment nous pouvons vous aider.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="mailto:contact@topinfo.com" class="bg-white text-blue-600 px-8 py-3.5 rounded-full font-semibold hover:shadow-xl hover:shadow-black/10 transition-all">Nous écrire</a>
                <a href="#" class="border-2 border-white/30 text-white px-8 py-3.5 rounded-full font-semibold hover:bg-white/10 transition-all">Appeler</a>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-gray-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-12">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-sm">T</span>
                        </div>
                        <span class="text-xl font-bold text-white">{{ config('app.name', 'TOPINFO') }}</span>
                    </div>
                    <p class="text-sm leading-relaxed">Solutions digitales innovantes pour propulser votre entreprise vers le futur.</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Services</h4>
                    <ul class="space-y-3 text-sm">
                        @foreach ($services as $service)
                        <li><a href="#" class="hover:text-white transition">{{ $service->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Liens rapides</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#services" class="hover:text-white transition">Services</a></li>
                        <li><a href="#projects" class="hover:text-white transition">Projets</a></li>
                        <li><a href="#partners" class="hover:text-white transition">Partenaires</a></li>
                        <li><a href="#products" class="hover:text-white transition">Produits</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Contact</h4>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            contact@topinfo.com
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Abidjan, Côte d'Ivoire
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-sm text-center">
                &copy; {{ date('Y') }} {{ config('app.name', 'TOPINFO') }}. Tous droits réservés.
            </div>
        </div>
    </footer>

</body>
</html>
