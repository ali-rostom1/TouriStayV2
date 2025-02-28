<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <a href="{{ route('listings.show', $listing->id) }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 p-2 rounded-full mr-3 transition">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <h2 class="text-2xl font-bold text-gray-800">Modifier l'hébergement</h2>
                    </div>
                    
                    <!-- Display validation errors at the top of the form -->
                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <strong>Whoops!</strong> Il y a des problèmes avec les informations saisies.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <form action="{{ route('listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 mb-4">
                        @csrf
                        @method('PUT')
                        <input type="text" class="hidden" name="landlord_id" value="{{auth()->user()->id}}">
                        <!-- Basic Information -->
                        <div class="border-b pb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Informations de base</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nom de l'hébergement</label>
                                    <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ $listing->name }}" required>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="type">Type d'hébergement</label>
                                    <select name="type" id="type" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                        <option value="">Sélectionnez un type</option>
                                        <option value="Appartement" {{ $listing->type == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                                        <option value="Maison" {{ $listing->type == 'Maison' ? 'selected' : '' }}>Maison</option>
                                        <option value="Villa" {{ $listing->type == 'Villa' ? 'selected' : '' }}>Villa</option>
                                        <option value="Chambre" {{ $listing->type == 'Chambre' ? 'selected' : '' }}>Chambre</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Prix par nuit (€)</label>
                                    <input type="number" name="price" id="price" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" min="1" step="0.01" value="{{ $listing->price }}" required>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                                    <textarea name="description" id="description" rows="3" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>{{ $listing->description }}</textarea>
                                </div>
                    
                            </div>
                        </div>
                        
                        <!-- Location -->
                        <div class="border-b pb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Localisation</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Adresse</label>
                                    <input type="text" name="location" id="address" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ $listing->location }}" required>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="city">Ville</label>
                                    <input type="text" name="city" id="city" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ $listing->city }}" required>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Pays</label>
                                    <input type="text" name="country" id="country" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ $listing->country }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Features -->
                        <div class="border-b pb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Caractéristiques</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="persons">Capacité (personnes)</label>
                                    <input type="number" name="persons" id="persons" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" min="1" value="{{ $listing->persons }}" required>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="rooms">Nombre de chambres</label>
                                    <input type="number" name="rooms" id="rooms" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" min="0" value="{{ $listing->rooms }}" required>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="equipments">Équipements</label>
                                    <textarea name="equipments" id="equipments" rows="3" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>{{ $listing->equipments }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Images -->
                        <div class="border-b pb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Photos</h3>
                            
                            <!-- Current images -->
                            <div class="mb-6">
                                <h4 class="text-sm font-bold text-gray-700 mb-3">Photos actuelles</h4>
                                @if(count($listing->images) > 0)
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4" id="current-images">
                                        @foreach($listing->images as $image)
                                            <div class="relative group" data-image-id="{{ $image->id }}">
                                                <img src="{{ asset('storage/'. $image->path) }}" alt="{{ $listing->name }}" class="w-full h-32 object-cover rounded-md">
                                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all rounded-md flex items-center justify-center">
                                                    <button type="button" onclick="removeImage({{ $image->id }})" class="hidden group-hover:block bg-white text-red-600 rounded-full p-2 hover:bg-red-500 hover:text-white transition">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-gray-500 italic">Aucune image disponible</p>
                                @endif
                            </div>
                            
                            <!-- Add new images -->
                            <div class="space-y-4">
                                <h4 class="text-sm font-bold text-gray-700 mb-1">Ajouter des photos</h4>
                                
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center" id="drop-area">
                                    <input type="file" name="new_images[]" id="image-upload" class="hidden" accept="image/*" multiple>
                                    <label for="image-upload" class="cursor-pointer">
                                        <div class="space-y-2">
                                            <i class="fas fa-cloud-upload-alt text-3xl text-blue-500"></i>
                                            <p class="text-sm font-medium">Glissez-déposez des images ou</p>
                                            <button type="button" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition">Parcourir les fichiers</button>
                                            <p class="text-xs text-gray-500">PNG, JPG ou JPEG (max. 5MB)</p>
                                        </div>
                                    </label>
                                </div>
                                
                                <div id="preview-container" class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4"></div>
                                
                                <!-- Hidden input for deleted images -->
                                <input type="hidden" name="deleted_images" id="deleted-images">
                            </div>
                        </div>
                        
                        <!-- Availability -->
                        <div class="border-b pb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Disponibilité</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="available_from">Disponible à partir de</label>
                                    <input type="date" name="startdate" id="available_from" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ \Carbon\Carbon::parse($listing->startdate)->format('Y-m-d') }}" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="available_to">Disponible jusqu'au</label>
                                    <input type="date" name="enddate" id="available_to" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ \Carbon\Carbon::parse($listing->enddate)->format('Y-m-d') }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-end">
                            <a href="{{ route('listings.show', $listing->id) }}" class="mr-4 px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition">Annuler</a>
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md font-medium hover:bg-blue-700 transition">Enregistrer les modifications</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        let deletedImages = [];
        
        function removeImage(imageId) {
            deletedImages.push(imageId);
            
            document.getElementById('deleted-images').value = JSON.stringify(deletedImages);
            
            const imageElement = document.querySelector(`[data-image-id="${imageId}"]`);
            if (imageElement) {
                imageElement.remove();
            }
            
            if (document.querySelectorAll('#current-images > div').length === 0) {
                document.getElementById('current-images').innerHTML = '<p class="text-gray-500 italic col-span-full">Toutes les images ont été supprimées</p>';
            }
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            const dropArea = document.getElementById('drop-area');
            const fileInput = document.getElementById('image-upload');
            const previewContainer = document.getElementById('preview-container');
            const browseButton = dropArea.querySelector('button');
            
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, highlight, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false);
            });
            
            function highlight() {
                dropArea.classList.add('border-blue-500', 'bg-blue-50');
            }
            
            function unhighlight() {
                dropArea.classList.remove('border-blue-500', 'bg-blue-50');
            }
            
            dropArea.addEventListener('drop', handleDrop, false);
            
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                handleFiles(files);
            }
            
            browseButton.addEventListener('click', function(e) {
                e.preventDefault();
                fileInput.click();
            });
            
            fileInput.addEventListener('change', function() {
                handleFiles(this.files);
            });
            
            function handleFiles(files) {
                files = [...files];
                files.forEach(previewFile);
            }
            
            function previewFile(file) {
                if (!file.type.match('image.*')) return;
                
                if (file.size > 5 * 1024 * 1024) {
                    alert('La taille du fichier doit être inférieure à 5 Mo');
                    return;
                }
                
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const preview = document.createElement('div');
                    preview.className = 'relative';
                    preview.innerHTML = `
                        <img src="${e.target.result}" alt="Preview" class="w-full h-32 object-cover rounded-md">
                        <button type="button" class="absolute top-2 right-2 bg-white rounded-full p-1 shadow-md hover:bg-red-500 hover:text-white transition">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    
                    const removeBtn = preview.querySelector('button');
                    removeBtn.addEventListener('click', function() {
                        preview.remove();
                    });
                    
                    previewContainer.appendChild(preview);
                }
                
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>