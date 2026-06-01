<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('services.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Modifier le service') }}
                </h2>
                <p class="text-sm text-gray-500">{{ $service->name }}</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Nom du service</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}"
                                class="w-full rounded-lg border-gray-200 bg-gray-50 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('name') border-red-500 @enderror"
                                placeholder="Développement Web" required>
                            @error('name')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Description</label>
                            <textarea name="description" id="description" rows="5"
                                class="w-full rounded-lg border-gray-200 bg-gray-50 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('description') border-red-500 @enderror"
                                placeholder="Description détaillée du service..." required>{{ old('description', $service->description) }}</textarea>
                            @error('description')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="icon" class="block text-sm font-medium text-gray-700 mb-1.5">Icône (image PNG/JPG/SVG)</label>
                            @if ($service->icon_url)
                                <div class="mb-3 flex items-center gap-3">
                                    <img src="{{ $service->icon_url }}" alt="Icône actuelle" class="w-12 h-12 object-contain rounded-lg border border-gray-200 bg-gray-50 p-1">
                                    <span class="text-xs text-gray-400">Icône actuelle — importez une nouvelle image pour la remplacer.</span>
                                </div>
                            @endif
                            <input type="file" name="icon" id="icon" accept="image/*"
                                class="w-full rounded-lg border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('icon') border-red-500 @enderror">
                            <p class="mt-1.5 text-xs text-gray-400">Formats acceptés : PNG, JPG, SVG, WEBP — max 5 Mo.</p>
                            @error('icon')
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
                        <a href="{{ route('services.index') }}"
                            class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-100 transition-colors">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
