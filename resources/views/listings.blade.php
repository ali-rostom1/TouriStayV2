<x-app-layout>
    <section class="bg-white shadow-md py-6">
        <div class="container mx-auto px-4">
            <form class="grid grid-cols-1 md:grid-cols-4 gap-4" action="{{route('listings.index')}}" method="GET">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="location">Destination</label>
                    <input type="text" name="location" class="w-full px-3 py-2 border rounded-md" placeholder="Selectionnez une ville" value="{{ request('location') }}">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="check-in">Arrivée</label>
                    <input type="date" name="check-in" id="check-in" class="w-full px-3 py-2 border rounded-md" value="{{ request('check-in') }}">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="check-out">Départ</label>
                    <input type="date" name="check-out" id="check-out" class="w-full px-3 py-2 border rounded-md" value="{{ request('check-out') }}">
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
                        <a href="{{route('listings.index')}}" class="border-2 rounded px-2 py-1 text-sm">
                            Reset
                        </a>
                    </div>
                    <!-- Price Range -->
                    <div class="flex items-center">
                        <label for="price-range" class="text-sm text-gray-600 mr-2">Prix max: </label>
                        <select id="price-range" class="border rounded px-2 py-1 text-sm" onchange="updateQueryParam('price',this.value)">
                            <option value="">Tous les prix</option>
                            <option value="50" {{ request('price') == '50' ? 'selected' : '' }}>< 50€</option>
                            <option value="100" {{ request('price') == '100' ? 'selected' : '' }}>< 100€</option>
                            <option value="200" {{ request('price') == '200' ? 'selected' : '' }}>< 200€</option>
                            <option value="300" {{ request('price') == '300' ? 'selected' : '' }}>< 300€</option>
                        </select>
                    </div>
                    
                    <!-- Property Type -->
                    <div class="flex items-center">
                        <label for="property-type" class="text-sm text-gray-600 mr-2">Type: </label>
                        <select id="property-type" class="border rounded px-2 py-1 text-sm" onchange="updateQueryParam('type',this.value)">
                            <option value="" >Tous les types</option>
                            <option value="Appartement" {{ request('type') == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                            <option value="Maison" {{ request('type') == 'Maison' ? 'selected' : '' }}>Maison</option>
                            <option value="Villa" {{ request('type') == 'Villa' ? 'selected' : '' }}>Villa</option>
                            <option value="Chambre" {{ request('type') == 'Chambre' ? 'selected' : '' }}>Chambre</option>
                        </select>
                    </div>
                    <!-- Sort By -->
                    <div class="flex items-center">
                        <label for="sort-by" class="text-sm text-gray-600 mr-2">Trier par: </label>
                        <select id="sort-by" class="border rounded px-2 py-1 text-sm" onchange="updateQueryParam('sort-by',this.value)">
                            <option value="asc" {{ request('sort-by') == 'asc' ? 'selected' : '' }}>Prix croissant</option>
                            <option value="desc" {{ request('sort-by') == 'desc' ? 'selected' : '' }}>Prix décroissant</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Results Section -->
    <section class="container mx-auto px-4 py-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">{{$total}} hébergements trouvés</h2>
            
            <!-- Items per page selector -->
            <div class="flex items-center mt-4 md:mt-0">
                <span class="text-sm text-gray-600 mr-2">Afficher:</span>
                <div class="flex space-x-2">
                    <a href="{{ route('listings.index') }}?{{ http_build_query(array_merge(request()->query(), ['pag' => 4])) }}" class="px-3 py-1 {{request('pag') == 4 || !request('pag') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'}}  rounded text-sm">4</a>
                    <a href="{{ route('listings.index') }}?{{ http_build_query(array_merge(request()->query(), ['pag' => 10])) }}" class="px-3 py-1 {{request('pag') == 10 ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'}} rounded text-sm ">10</a>
                    <a href="{{ route('listings.index') }}?{{ http_build_query(array_merge(request()->query(), ['pag' => 15])) }}" class="px-3 py-1 {{request('pag') == 15 ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'}} rounded text-sm">15</a>
                </div>
            </div>
        </div>
        
        <!-- Listings Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($listings as $listing)
            <!-- Listing Card 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                <div class="relative">
                    @if(count($listing->images) > 0)
                    <img src="{{asset('storage/'. $listing->images[0]->path)}}" alt="{{$listing->name}}" class="w-full h-48 object-cover">
                    @else
                    <div class="bg-gray-100 h-48 rounded-lg flex items-center justify-center">
                        <p class="text-gray-500">Aucune image disponible</p>
                    </div>
                    @endif
                    @role('tourist')
                    <a href="{{route('favorite',$listing->id)}}" class="absolute top-3 right-3 bg-white rounded-full p-2 shadow-md hover:bg-yellow-300 transition">
                        @if($tourist->favoriteListings->contains('id', $listing->id))
                        <i class="fa-solid fa-heart text-red-500"></i>
                        @else
                        <i class="far fa-heart text-gray-600"></i>
                        @endif
                    </a>
                    @endrole
                    <span class="absolute bottom-3 left-3 bg-blue-600 text-white px-2 py-1 rounded text-xs font-semibold">{{$listing->type}}</span>
                </div>
                <div class="p-4">
                    <div class="flex justify-between mb-1">
                        <h3 class="font-bold">{{$listing->name}}</h3>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 text-sm"></i>
                            <span class="text-sm ml-1">4.8</span>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-2">{{$listing->city . ', ' . $listing->country}}</p>
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="fas fa-user-friends mr-1"></i> {{$listing->persons > 1 ? $listing->persons . " personnes" : $listing->persons . " personne"}} 
                        <span class="mx-2">•</span>
                        <i class="fas fa-bed mr-1"></i> {{$listing->rooms > 1 ? $listing->rooms . " chambres" : $listing->rooms . " chambre"}}
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="font-bold text-blue-600">{{$listing->price}}€ <span class="text-gray-500 font-normal text-sm">/ nuit</span></p>
                        <a href="{{route('listings.show',$listing->id)}}" class="text-blue-600 text-sm font-medium hover:underline">Voir détails</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-10">
            {{$listings->links()}}
        </div>
        
    </section>
    <script>
        function updateQueryParam(key, value) {
            const url = new URL(window.location.href);
            const params = new URLSearchParams(url.search);

            if (value) {
                params.set(key, value);
            } else {
                params.delete(key);
            }

            window.location.href = `${url.pathname}?${params.toString()}`;
        }
    </script>
</x-app-layout>