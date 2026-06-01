<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('partenaires.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Modifier le partenaire') }}
                </h2>
                <p class="text-sm text-gray-500">{{ $partenaire->name }}</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <form action="{{ route('partenaires.update', $partenaire->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Nom du partenaire</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $partenaire->name) }}"
                                class="w-full rounded-lg border-gray-200 bg-gray-50 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('name') border-red-500 @enderror"
                                placeholder="Nom de l'entreprise ou organisation" required>
                            @error('name')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Logo actuel</label>
                            @if ($partenaire->logo_url)
                                <div class="mb-3">
                                    <img src="{{ $partenaire->logo_url }}" alt="{{ $partenaire->name }}" class="h-16 w-auto max-w-[180px] rounded-lg object-contain border border-gray-200">
                                </div>
                            @endif
                            <label for="logo" class="block text-sm font-medium text-gray-700 mb-1.5">Nouveau logo (optionnel)</label>
                            <div class="mt-1 flex items-center gap-4">
                                <label class="relative cursor-pointer bg-gray-50 hover:bg-gray-100 border-2 border-dashed border-gray-200 rounded-lg px-6 py-4 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <div>
                                            <p class="text-sm font-medium text-gray-600">Cliquez pour changer le logo</p>
                                            <p class="text-xs text-gray-400">PNG, JPG, SVG (max. 2 Mo)</p>
                                        </div>
                                    </div>
                                    <input type="file" name="logo" id="logo" accept="image/*" class="hidden" onchange="document.getElementById('logo-preview').classList.remove('hidden'); document.getElementById('logo-preview').src = window.URL.createObjectURL(this.files[0])">
                                </label>
                                <img id="logo-preview" class="hidden h-16 w-auto max-w-[120px] rounded-lg object-contain border border-gray-200">
                            </div>
                            @error('logo')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition-colors inline-flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                            </svg>
                            Mettre à jour
                        </button>
                        <a href="{{ route('partenaires.index') }}"
                            class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-100 transition-colors">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
