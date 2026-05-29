<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Bienvenue</h2>
        <p class="text-gray-500 mt-2">Connectez-vous à votre compte</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-gray-700" />
            <div class="mt-1.5 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <x-text-input id="email" class="block w-full pl-11 pr-4 py-3 border-gray-200 rounded-xl focus:border-brand-blue focus:ring-brand-blue bg-gray-50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="vous@exemple.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
        </div>

        <div>
            <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Mot de passe')" class="text-sm font-medium text-gray-700" />
                @if (Route::has('password.request'))
                    <a class="text-sm font-medium text-brand-blue hover:text-brand-blue-dark transition-colors" href="{{ route('password.request') }}">
                        Mot de passe oublié?
                    </a>
                @endif
            </div>
            <div class="mt-1.5 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <x-text-input id="password" class="block w-full pl-11 pr-4 py-3 border-gray-200 rounded-xl focus:border-brand-blue focus:ring-brand-blue bg-gray-50"
                                type="password"
                                name="password"
                                required autocomplete="current-password"
                                placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
        </div>

        <div class="flex items-center">
            <label for="remember_me" class="flex items-center gap-3 cursor-pointer group">
                <input id="remember_me" type="checkbox" class="w-4 h-4 rounded border-gray-300 text-brand-blue focus:ring-brand-blue cursor-pointer" name="remember">
                <span class="text-sm text-gray-600 group-hover:text-gray-900 transition-colors">{{ __('Se souvenir de moi') }}</span>
            </label>
        </div>

        <x-primary-button class="w-full justify-center py-3.5 bg-gradient-to-r from-brand-blue to-brand-blue-dark hover:from-brand-blue-dark hover:to-brand-blue text-white font-semibold rounded-xl shadow-lg shadow-blue-200 hover:shadow-xl hover:shadow-blue-300 transition-all duration-200">
            <span>Se connecter</span>
            <svg class="w-5 h-5 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
        </x-primary-button>

        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-4 bg-white text-gray-500">ou</span>
            </div>
        </div>

        <p class="text-center text-sm text-gray-500">
            Pas encore de compte?
            <a href="{{ route('register') }}" class="font-semibold text-brand-blue hover:text-brand-blue-dark transition-colors ml-1">
                Créer un compte
            </a>
        </p>
    </form>
</x-guest-layout>
