<div x-data="{ sidebarOpen: false }">
    <nav class="fixed inset-y-0 left-0 z-30 w-64 flex flex-col bg-gradient-to-b from-[#0f1e3d] via-[#13294b] to-[#1a365d] shadow-2xl transition-all duration-300 ease-out lg:translate-x-0" :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
        <div class="flex items-center gap-3 px-6 h-16 border-b border-white/10">
            <div class="flex-shrink-0">
                <x-application-logo class="w-8 h-8 text-blue-400" />
            </div>
            <div>
                <h1 class="text-lg font-bold text-white tracking-tight">{{ config('app.name', 'TopInfo') }}</h1>
                <p class="text-xs text-blue-300/70">Espace administration</p>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto py-4 px-3 space-y-1 sidebar-scroll">
            <p class="px-3 text-xs font-semibold text-blue-300/50 uppercase tracking-wider mb-3">Menu principal</p>

            <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" icon="dashboard">
                {{ __('Tableau de bord') }}
            </x-sidebar-link>

            <x-sidebar-link :href="route('projects.index')" :active="request()->routeIs('projects.*')" icon="projects">
                {{ __('Projets') }}
            </x-sidebar-link>

            <x-sidebar-link :href="route('services.index')" :active="request()->routeIs('services.*')" icon="services">
                {{ __('Services') }}
            </x-sidebar-link>

            <x-sidebar-link :href="route('partenaires.index')" :active="request()->routeIs('partenaires.*')" icon="partenaires">
                {{ __('Partenaires') }}
            </x-sidebar-link>

            <x-sidebar-link :href="route('actuality.index')" :active="request()->routeIs('actuality.*')" icon="actuality">
                {{ __('Actualités') }}
            </x-sidebar-link>
        </div>

        <div class="p-3 border-t border-white/10">
            <div x-data="{ profileOpen: false }" class="relative">
                <button @click="profileOpen = !profileOpen" class="flex items-center gap-3 w-full px-3 py-2.5 rounded-xl text-white/80 hover:text-white hover:bg-white/10 transition-all duration-200 group">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white text-sm font-bold shadow-lg">
                        {{ substr(Auth::user()->name, 0, 2) }}
                    </div>
                    <div class="flex-1 text-left min-w-0">
                        <p class="text-sm font-medium truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-blue-300/60 truncate">{{ Auth::user()->email }}</p>
                    </div>
                    <svg class="w-4 h-4 text-blue-300/60 group-hover:text-white transition-colors" :class="{'rotate-180': profileOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="profileOpen" @click.outside="profileOpen = false" class="absolute bottom-full left-0 right-0 mb-2 bg-[#1a2d52] border border-white/10 rounded-xl shadow-xl overflow-hidden" x-cloak>
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 text-sm text-white/80 hover:text-white hover:bg-white/10 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Mon profil
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-3 w-full px-4 py-3 text-sm text-white/80 hover:text-white hover:bg-white/10 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="lg:hidden">
        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-20 bg-black/50 backdrop-blur-sm" x-cloak></div>
        <button @click="sidebarOpen = !sidebarOpen" class="fixed top-4 left-4 z-20 p-2.5 bg-white rounded-xl shadow-lg text-gray-700 hover:text-brand-blue transition-colors border border-gray-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
</div>
