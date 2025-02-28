<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Back button and listing name -->
                    <div class="flex items-center mb-6">
                        <a href="{{ route('myListings') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 p-2 rounded-full mr-3 transition">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <h2 class="text-3xl font-bold text-gray-800">{{ $listing->name }}</h2>
                    </div>

                    <!-- Images gallery -->
                    <div class="mb-8">
                        @if(count($listing->images) > 0)
                            <div class="grid grid-cols-4 gap-4">
                                <div class="col-span-4 md:col-span-2 h-80">
                                    <a href="{{ asset('storage/'. $listing->images[0]->path) }}" data-fancybox="gallery" data-caption="{{ $listing->name }}">
                                        <img src="{{ asset('storage/'. $listing->images[0]->path) }}" alt="{{ $listing->name }}" class="w-full h-full object-cover rounded-lg">
                                    </a>
                                </div>
                                <div class="col-span-4 md:col-span-2 grid grid-cols-2 gap-4">
                                    @foreach($listing->images->slice(1, 4) as $image)
                                        <div class="h-38">
                                            <a href="{{ asset('storage/'. $image->path) }}" data-fancybox="gallery" data-caption="{{ $listing->name }}">
                                                <img src="{{ asset('storage/'. $image->path) }}" alt="{{ $listing->name }}" class="w-full h-full object-cover rounded-lg">
                                            </a>
                                        </div>
                                    @endforeach
                                    @if(count($listing->images) > 5)
                                        <div class="relative h-38">
                                            <a href="{{ asset('storage/'. $listing->images[5]->path) }}" data-fancybox="gallery" data-caption="{{ $listing->name }}">
                                                <img src="{{ asset('storage/'. $listing->images[5]->path) }}" alt="{{ $listing->name }}" class="w-full h-full object-cover rounded-lg brightness-50">
                                            </a>
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <button class="bg-white px-4 py-2 rounded-md font-medium hover:bg-gray-100 transition" onclick="openLightbox()">
                                                    Voir toutes les photos ({{ count($listing->images) }})
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="bg-gray-100 h-80 rounded-lg flex items-center justify-center">
                                <p class="text-gray-500">Aucune image disponible</p>
                            </div>
                        @endif
                    </div>

                    <!-- Listing details -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Left column - Main details -->
                        <div class="md:col-span-2 space-y-8">
                            <!-- Basic information -->
                            <div class="border-b pb-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <h3 class="text-2xl font-bold text-gray-800">{{ $listing->name }}</h3>
                                        <div class="flex items-center text-gray-600 mt-1">
                                            <span>{{ $listing->rooms }} chambres</span>
                                            <span class="mx-2">•</span>
                                            <span>Pour {{ $listing->persons }} personnes</span>
                                            <span class="mx-2">•</span>
                                            <span>{{ $listing->city }}, {{ $listing->country }}</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="prose max-w-none">
                                    <p>{{ $listing->description }}</p>
                                </div>
                            </div>
                            
                            <!-- Equipments -->
                            <div class="border-b pb-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-4">Équipements</h3>
                                <div class="prose max-w-none">
                                    <p>{{ $listing->equipments }}</p>
                                </div>
                            </div>
                            
                            <!-- Location -->
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-4">Localisation</h3>
                                <div class="mb-4">
                                    <p class="text-gray-700">{{ $listing->location }}</p>
                                    <p class="text-gray-700">{{ $listing->city }}, {{ $listing->country }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right column - Availability and actions -->
                        <div class="space-y-6">
                            <!-- Price card -->
                            <div class="bg-white border rounded-lg shadow-md p-6">
                                <div class="mb-4">
                                    <span class="text-2xl font-bold text-gray-800">{{ $listing->price }}€</span>
                                    <span class="text-gray-600"> / nuit</span>
                                </div>
                                
                                <!-- Availability -->
                                <div class="mb-4">
                                    <h4 class="font-bold text-gray-800 mb-2">Disponibilité</h4>
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-gray-700">Du</p>
                                            <p class="font-medium">{{ \Carbon\Carbon::parse($listing->startdate)->format('d/m/Y') }}</p>
                                        </div>
                                        <div class="border-t-2 border-gray-300 w-8"></div>
                                        <div>
                                            <p class="text-gray-700">Au</p>
                                            <p class="font-medium">{{ \Carbon\Carbon::parse($listing->enddate)->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Actions -->
                                <div class="space-y-3">
                                    <a href="{{ route('listings.edit', $listing->id) }}" class="block w-full bg-blue-600 text-white px-4 py-2 rounded-md font-medium hover:bg-blue-700 transition text-center">
                                        <i class="fas fa-edit mr-2"></i> Modifier
                                    </a>
                                    
                                    
                                    <button onclick="confirmDelete({{ $listing->id }})" class="block w-full bg-red-600 text-white px-4 py-2 rounded-md font-medium hover:bg-red-700 transition">
                                        <i class="fas fa-trash mr-2"></i> Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center">
        <div class="relative mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 text-red-600">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 mt-2">Confirmation de suppression</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Êtes-vous sûr de vouloir supprimer cet hébergement ? Cette action est irréversible.
                    </p>
                </div>
                <div class="flex justify-center mt-4 gap-4">
                    <button id="cancelDelete" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition">
                        Annuler
                    </button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openLightbox() {
            $('[data-fancybox="gallery"]').fancybox({
                loop: true, 
                buttons: [
                    "zoom",
                    "share",
                    "slideShow",
                    "fullScreen",
                    "download",
                    "thumbs",
                    "close"
                ],
                animationEffect: "fade", 
                transitionEffect: "fade", 
                transitionDuration: 300, 
                slideShow: {
                    autoStart: false,
                    speed: 2000
                },
                thumbs: {
                    autoStart: true 
                }
            });
        }
    
    
        document.addEventListener('DOMContentLoaded', function() {
            openLightbox();
        });
    
        function confirmDelete(id) {
            const modal = document.getElementById('deleteModal');
            const deleteForm = document.getElementById('deleteForm');
            const cancelDelete = document.getElementById('cancelDelete');
            
            deleteForm.action = `/listings/${id}/`;
            
            modal.classList.remove('hidden');
            
            cancelDelete.onclick = function() {
                modal.classList.add('hidden');
            }
            
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.classList.add('hidden');
                }
            }
        }
    </script>
</x-app-layout>