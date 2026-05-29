<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('actuality.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Nouvelle actualité') }}
                </h2>
                <p class="text-sm text-gray-500">Publiez un article ou une actualité</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <form action="{{ route('actuality.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf

                    <div class="space-y-6">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1.5">Titre</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="w-full rounded-lg border-gray-200 bg-gray-50 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('title') border-red-500 @enderror"
                                placeholder="Titre de l'actualité" required>
                            @error('title')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Description courte</label>
                            <textarea name="description" id="description" rows="3"
                                class="w-full rounded-lg border-gray-200 bg-gray-50 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('description') border-red-500 @enderror"
                                placeholder="Résumé ou accroche de l'article..." required>{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-1.5">Contenu</label>
                            <textarea name="content" id="content" rows="10"
                                class="w-full rounded-lg border-gray-200 bg-gray-50 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('content') border-red-500 @enderror"
                                placeholder="Contenu détaillé de l'article..." required>{{ old('content') }}</textarea>
                            @error('content')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid sm:grid-cols-2 gap-6">
                            <div>
                                <label for="publication_date" class="block text-sm font-medium text-gray-700 mb-1.5">Date de publication</label>
                                <input type="date" name="publication_date" id="publication_date" value="{{ old('publication_date', date('Y-m-d')) }}"
                                    class="w-full rounded-lg border-gray-200 bg-gray-50 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('publication_date') border-red-500 @enderror" required>
                                @error('publication_date')
                                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="image_path" class="block text-sm font-medium text-gray-700 mb-1.5">Image à la une</label>
                                <div class="mt-1 flex items-center gap-4">
                                    <label class="relative cursor-pointer bg-gray-50 hover:bg-gray-100 border-2 border-dashed border-gray-200 rounded-lg px-6 py-4 transition-colors w-full text-center">
                                        <svg class="w-6 h-6 mx-auto text-gray-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <p class="text-xs text-gray-500">Cliquez pour ajouter</p>
                                        <input type="file" name="image_path" id="image_path" accept="image/*" class="hidden" onchange="document.getElementById('image-preview').classList.remove('hidden'); document.getElementById('image-preview').src = window.URL.createObjectURL(this.files[0])">
                                    </label>
                                    <img id="image-preview" class="hidden w-20 h-16 rounded-lg object-cover border border-gray-200">
                                </div>
                                @error('image_path')
                                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition-colors inline-flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Publier l'actualité
                        </button>
                        <a href="{{ route('actuality.index') }}"
                            class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-100 transition-colors">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
