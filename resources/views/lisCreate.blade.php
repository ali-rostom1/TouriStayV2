<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Ajouter un hébergement</h2>
                    
                    <form action="{{ route('listings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 mb-4">
                        @csrf
                        <input type="text" class="hidden" name="landlord_id" value="{{Auth::user()->id}}">
                        <!-- Basic Information -->
                        <div class="border-b pb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Informations de base</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nom de l'hébergement</label>
                                    <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="type">Type d'hébergement</label>
                                    <select name="type" id="type" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                        <option value="">Sélectionnez un type</option>
                                        <option value="Appartement">Appartement</option>
                                        <option value="Maison">Maison</option>
                                        <option value="Villa">Villa</option>
                                        <option value="Chambre">Chambre</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Prix par nuit (€)</label>
                                    <input type="number" name="price" id="price" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" min="1" step="0.01" required>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                                    <textarea name="description" id="description" rows="3" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Location -->
                        <div class="border-b pb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Localisation</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Adresse</label>
                                    <input type="text" name="location" id="address" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="city">Ville</label>
                                    <input type="text" name="city" id="city" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Pays</label>
                                    <input type="text" name="country" id="country" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Features -->
                        <div class="border-b pb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Caractéristiques</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="persons">Capacité (personnes)</label>
                                    <input type="number" name="persons" id="persons" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" min="1" required>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="rooms">Nombre de chambres</label>
                                    <input type="number" name="rooms" id="rooms" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" min="0" required>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Equipments</label>
                                    <textarea name="equipments" id="equipments" rows="3" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Images -->
                        <div class="border-b pb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Photos</h3>
                            
                            <div class="space-y-4">
                                <div class="flex items-center space-x-4">
                                    <label class="block text-gray-700 text-sm font-bold" for="image">Photos de l'hébergement</label>
                                </div>
                                
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center" id="drop-area">
                                    <input type="file" name="images[]" id="image-upload" class="hidden" accept="image/*" multiple>
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
                            </div>
                        </div>
                        
                        <!-- Availability -->
                        <div class="border-b pb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Disponibilité</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="available_from">Disponible à partir de</label>
                                    <input type="date" name="startdate" id="available_from" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="available_from">Disponible à partir de</label>
                                    <input type="date" name="enddate" id="available_from" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="button" class="mr-4 px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition">Annuler</button>
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md font-medium hover:bg-blue-700 transition">Publier l'annonce</button>
                        </div>
                    </form>
                    <!-- Display validation errors at the top of the form -->
                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                </div>
            </div>
        </div>
    </div>
    
    <script>
       document.addEventListener('DOMContentLoaded', function() {
        const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('image-upload');
        const previewContainer = document.getElementById('preview-container');
        const browseButton = dropArea.querySelector('button');
        
        // Prevent default drag behaviors
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        // Highlight drop area when item is dragged over it
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
        
        // Handle dropped files
        dropArea.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }
        
        // Connect the browse button to trigger file input
        browseButton.addEventListener('click', function(e) {
            e.preventDefault();
            fileInput.click(); // This triggers the file input dialog
        });
        
        fileInput.addEventListener('change', function() {
            handleFiles(this.files);
        });
        
        function handleFiles(files) {
            files = [...files];
            files.forEach(previewFile);
        }
        
        function previewFile(file) {
            // Check if file is an image
            if (!file.type.match('image.*')) return;
            
            // Check file size (5MB max)
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be less than 5MB');
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
                
                // Add remove functionality
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