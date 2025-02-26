<x-app-layout>
    <section class="bg-white shadow-md py-6">
        <div class="container mx-auto px-4">
            <form class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="location">Destination</label>
                    <select id="location" class="w-full px-3 py-2 border rounded-md">
                        <option value="">Toutes les villes</option>
                        <option value="casablanca">Casablanca</option>
                        <option value="rabat">Rabat</option>
                        <option value="marrakech">Marrakech</option>
                        <option value="madrid">Madrid</option>
                        <option value="barcelona">Barcelone</option>
                        <option value="lisbon">Lisbonne</option>
                        <option value="porto">Porto</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="check-in">Arrivée</label>
                    <input type="date" id="check-in" class="w-full px-3 py-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="check-out">Départ</label>
                    <input type="date" id="check-out" class="w-full px-3 py-2 border rounded-md">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-blue-600 text-white w-full px-6 py-2 rounded-md font-medium hover:bg-blue-700 transition">Rechercher</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Advanced Filters -->
    <section class="container mx-auto px-4 py-4">
        <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
            <div class="flex flex-wrap items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-700 mb-2 md:mb-0">Filtres avancés</h3>
                
                <div class="flex flex-wrap gap-3">
                    <!-- Price Range -->
                    <div class="flex items-center">
                        <label for="price-range" class="text-sm text-gray-600 mr-2">Prix max: </label>
                        <select id="price-range" class="border rounded px-2 py-1 text-sm">
                            <option value="">Tous les prix</option>
                            <option value="50">< 50€</option>
                            <option value="100">< 100€</option>
                            <option value="200">< 200€</option>
                            <option value="300">< 300€</option>
                        </select>
                    </div>
                    
                    <!-- Property Type -->
                    <div class="flex items-center">
                        <label for="property-type" class="text-sm text-gray-600 mr-2">Type: </label>
                        <select id="property-type" class="border rounded px-2 py-1 text-sm">
                            <option value="">Tous les types</option>
                            <option value="apartment">Appartement</option>
                            <option value="house">Maison</option>
                            <option value="villa">Villa</option>
                            <option value="room">Chambre</option>
                        </select>
                    </div>
                    
                    <!-- Amenities Dropdown -->
                    <div class="relative">
                        <button type="button" class="flex items-center border rounded px-3 py-1 text-sm bg-white">
                            <span>Équipements</span>
                            <i class="fas fa-chevron-down ml-2 text-xs"></i>
                        </button>
                        <!-- Dropdown content (hidden by default) -->
                        <div class="hidden absolute right-0 mt-2 bg-white border rounded shadow-lg p-4 z-10 w-60">
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" class="mr-2">
                                    <span class="text-sm">WiFi</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="mr-2">
                                    <span class="text-sm">Climatisation</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="mr-2">
                                    <span class="text-sm">Cuisine</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="mr-2">
                                    <span class="text-sm">Machine à laver</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="mr-2">
                                    <span class="text-sm">Parking</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="mr-2">
                                    <span class="text-sm">Piscine</span>
                                </label>
                            </div>
                            <div class="mt-4 flex justify-end">
                                <button type="button" class="bg-blue-600 text-white px-3 py-1 rounded text-sm">Appliquer</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sort By -->
                    <div class="flex items-center">
                        <label for="sort-by" class="text-sm text-gray-600 mr-2">Trier par: </label>
                        <select id="sort-by" class="border rounded px-2 py-1 text-sm">
                            <option value="recommended">Recommandés</option>
                            <option value="price-low">Prix croissant</option>
                            <option value="price-high">Prix décroissant</option>
                            <option value="rating">Meilleures notes</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Results Section -->
    <section class="container mx-auto px-4 py-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">62 hébergements trouvés</h2>
            
            <!-- Items per page selector -->
            <div class="flex items-center mt-4 md:mt-0">
                <span class="text-sm text-gray-600 mr-2">Afficher:</span>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 bg-blue-600 text-white rounded text-sm">4</button>
                    <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded text-sm hover:bg-gray-300">10</button>
                    <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded text-sm hover:bg-gray-300">25</button>
                </div>
            </div>
        </div>
        
        <!-- Listings Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Listing Card 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                <div class="relative">
                    <img src="https://via.placeholder.com/400x300" alt="Appartement à Casablanca" class="w-full h-48 object-cover">
                    <button class="absolute top-3 right-3 bg-white rounded-full p-2 shadow-md hover:bg-yellow-300 transition">
                        <i class="far fa-heart text-gray-600"></i>
                    </button>
                    <span class="absolute bottom-3 left-3 bg-blue-600 text-white px-2 py-1 rounded text-xs font-semibold">Appartement</span>
                </div>
                <div class="p-4">
                    <div class="flex justify-between mb-1">
                        <h3 class="font-bold">Appartement moderne</h3>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 text-sm"></i>
                            <span class="text-sm ml-1">4.8</span>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-2">Casablanca, Maroc</p>
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="fas fa-user-friends mr-1"></i> 4 personnes
                        <span class="mx-2">•</span>
                        <i class="fas fa-bed mr-1"></i> 2 chambres
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="font-bold text-blue-600">85€ <span class="text-gray-500 font-normal text-sm">/ nuit</span></p>
                        <a href="#" class="text-blue-600 text-sm font-medium hover:underline">Voir détails</a>
                    </div>
                </div>
            </div>
            
            <!-- Listing Card 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                <div class="relative">
                    <img src="https://via.placeholder.com/400x300" alt="Villa à Marrakech" class="w-full h-48 object-cover">
                    <button class="absolute top-3 right-3 bg-white rounded-full p-2 shadow-md hover:bg-yellow-300 transition">
                        <i class="fas fa-heart text-yellow-400"></i>
                    </button>
                    <span class="absolute bottom-3 left-3 bg-blue-600 text-white px-2 py-1 rounded text-xs font-semibold">Villa</span>
                </div>
                <div class="p-4">
                    <div class="flex justify-between mb-1">
                        <h3 class="font-bold">Villa avec piscine</h3>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 text-sm"></i>
                            <span class="text-sm ml-1">4.9</span>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-2">Marrakech, Maroc</p>
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="fas fa-user-friends mr-1"></i> 8 personnes
                        <span class="mx-2">•</span>
                        <i class="fas fa-bed mr-1"></i> 4 chambres
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="font-bold text-blue-600">195€ <span class="text-gray-500 font-normal text-sm">/ nuit</span></p>
                        <a href="#" class="text-blue-600 text-sm font-medium hover:underline">Voir détails</a>
                    </div>
                </div>
            </div>
            
            <!-- Listing Card 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                <div class="relative">
                    <img src="https://via.placeholder.com/400x300" alt="Appartement à Madrid" class="w-full h-48 object-cover">
                    <button class="absolute top-3 right-3 bg-white rounded-full p-2 shadow-md hover:bg-yellow-300 transition">
                        <i class="far fa-heart text-gray-600"></i>
                    </button>
                    <span class="absolute bottom-3 left-3 bg-blue-600 text-white px-2 py-1 rounded text-xs font-semibold">Appartement</span>
                </div>
                <div class="p-4">
                    <div class="flex justify-between mb-1">
                        <h3 class="font-bold">Appartement au centre</h3>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 text-sm"></i>
                            <span class="text-sm ml-1">4.6</span>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-2">Madrid, Espagne</p>
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="fas fa-user-friends mr-1"></i> 3 personnes
                        <span class="mx-2">•</span>
                        <i class="fas fa-bed mr-1"></i> 1 chambre
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="font-bold text-blue-600">120€ <span class="text-gray-500 font-normal text-sm">/ nuit</span></p>
                        <a href="#" class="text-blue-600 text-sm font-medium hover:underline">Voir détails</a>
                    </div>
                </div>
            </div>
            
            <!-- Listing Card 4 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                <div class="relative">
                    <img src="https://via.placeholder.com/400x300" alt="Maison à Lisbonne" class="w-full h-48 object-cover">
                    <button class="absolute top-3 right-3 bg-white rounded-full p-2 shadow-md hover:bg-yellow-300 transition">
                        <i class="far fa-heart text-gray-600"></i>
                    </button>
                    <span class="absolute bottom-3 left-3 bg-blue-600 text-white px-2 py-1 rounded text-xs font-semibold">Maison</span>
                </div>
                <div class="p-4">
                    <div class="flex justify-between mb-1">
                        <h3 class="font-bold">Maison traditionnelle</h3>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 text-sm"></i>
                            <span class="text-sm ml-1">4.7</span>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-2">Lisbonne, Portugal</p>
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="fas fa-user-friends mr-1"></i> 6 personnes
                        <span class="mx-2">•</span>
                        <i class="fas fa-bed mr-1"></i> 3 chambres
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="font-bold text-blue-600">150€ <span class="text-gray-500 font-normal text-sm">/ nuit</span></p>
                        <a href="#" class="text-blue-600 text-sm font-medium hover:underline">Voir détails</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Pagination -->
        <div class="flex justify-center mt-8">
            <nav class="flex items-center space-x-2">
                <button class="px-3 py-1 rounded border text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-chevron-left text-xs"></i>
                </button>
                <button class="px-3 py-1 rounded bg-blue-600 text-white">1</button>
                <button class="px-3 py-1 rounded border text-gray-600 hover:bg-gray-100">2</button>
                <button class="px-3 py-1 rounded border text-gray-600 hover:bg-gray-100">3</button>
                <span class="px-2">...</span>
                <button class="px-3 py-1 rounded border text-gray-600 hover:bg-gray-100">15</button>
                <button class="px-3 py-1 rounded border text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-chevron-right text-xs"></i>
                </button>
            </nav>
        </div>
    </section>
</x-app-layout>