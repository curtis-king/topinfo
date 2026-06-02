<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('galerie.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ajouter une image</h2>
                <p class="text-sm text-gray-500">Ajoutez une nouvelle photo à la galerie</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <form action="{{ route('galerie.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf

                    <div class="space-y-6">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1.5">Titre</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="w-full rounded-lg border-gray-200 bg-gray-50 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('title') border-red-500 @enderror"
                                placeholder="Ex: Inauguration siège social" required>
                            @error('title')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Description <span class="text-gray-400 font-normal">(optionnel)</span></label>
                            <textarea name="description" id="description" rows="3"
                                class="w-full rounded-lg border-gray-200 bg-gray-50 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500 transition-colors @error('description') border-red-500 @enderror"
                                placeholder="Décrivez cette photo...">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Image</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed border-gray-200 rounded-xl hover:border-blue-300 transition-colors cursor-pointer" id="drop-zone">
                                <div class="space-y-2 text-center" id="drop-content">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <div class="text-sm text-gray-500">
                                        <label for="cover_image" class="cursor-pointer text-blue-600 hover:text-blue-500 font-medium">Choisir une image</label>
                                        <span> ou glisser-déposer</span>
                                    </div>
                                    <p class="text-xs text-gray-400">PNG, JPG, WEBP — max 5 Mo</p>
                                </div>
                                <img id="preview" class="hidden max-h-48 rounded-lg mx-auto object-contain" alt="Aperçu">
                            </div>
                            <input type="file" name="cover_image" id="cover_image" accept="image/*" class="sr-only" required>
                            @error('cover_image')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition-colors inline-flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Ajouter à la galerie
                        </button>
                        <a href="{{ route('galerie.index') }}"
                            class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-100 transition-colors">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const input = document.getElementById('cover_image');
        const dropZone = document.getElementById('drop-zone');
        const dropContent = document.getElementById('drop-content');
        const preview = document.getElementById('preview');

        dropZone.addEventListener('click', () => input.click());

        input.addEventListener('change', () => {
            const file = input.files[0];
            if (file) showPreview(file);
        });

        dropZone.addEventListener('dragover', e => { e.preventDefault(); dropZone.classList.add('border-blue-400', 'bg-blue-50'); });
        dropZone.addEventListener('dragleave', () => dropZone.classList.remove('border-blue-400', 'bg-blue-50'));
        dropZone.addEventListener('drop', e => {
            e.preventDefault();
            dropZone.classList.remove('border-blue-400', 'bg-blue-50');
            const file = e.dataTransfer.files[0];
            if (file) {
                const dt = new DataTransfer();
                dt.items.add(file);
                input.files = dt.files;
                showPreview(file);
            }
        });

        function showPreview(file) {
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                dropContent.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    </script>
</x-app-layout>
