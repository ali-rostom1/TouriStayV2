<x-app-layout>
    <!-- Hero Section -->
    <header class="bg-cover bg-center h-96" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://www.moroccoworldnews.com/wp-content/uploads/2024/11/morocco-gears-up-for-2030-world-cup-tourism-boom-wary-of-overtourism.jpg');">
        <div class="container mx-auto h-full flex flex-col justify-center px-4">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Trouvez votre hébergement idéal pour le Mondial 2030</h1>
            <p class="text-xl text-white mb-8">Des milliers de logements au Maroc, en Espagne et au Portugal</p>
            
            <!-- Search Form -->
            <div class="bg-white p-4 rounded-lg shadow-md max-w-4xl">
                <form class="flex flex-col md:flex-row gap-4">
                    <div class="flex-grow">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="location">Destination</label>
                        <input type="text" class="w-full px-3 py-2 border rounded-md" placeholder="Selectionnez une ville">

                    </div>
                    <div class="flex-grow">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="check-in">Arrivée</label>
                        <input type="date" id="check-in" class="w-full px-3 py-2 border rounded-md">
                    </div>
                    <div class="flex-grow">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="check-out">Départ</label>
                        <input type="date" id="check-out" class="w-full px-3 py-2 border rounded-md">
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md font-medium hover:bg-blue-700 transition">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>
    </header>

    <!-- Featured Destinations -->
    <section class="container mx-auto py-12 px-4">
        <h2 class="text-3xl font-bold text-center mb-10">Destinations phares du Mondial 2030</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Destination Card 1 -->
            <div class="rounded-lg overflow-hidden shadow-md hover:shadow-xl transition">
                <img src="{{asset('images/casablanca.jpg')}}" alt="Casablanca" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Casablanca, Maroc</h3>
                    <p class="text-gray-600 mb-4">Découvrez la plus grande ville du Maroc et ses nombreuses attractions</p>
                    <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Explorer les logements <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>
            
            <!-- Destination Card 2 -->
            <div class="rounded-lg overflow-hidden shadow-md hover:shadow-xl transition">
                <img src="{{asset('images/madrid.jpg')}}" alt="Madrid" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Madrid, Espagne</h3>
                    <p class="text-gray-600 mb-4">Vivez l'ambiance festive de la capitale espagnole pendant le Mondial</p>
                    <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Explorer les logements <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>
            
            <!-- Destination Card 3 -->
            <div class="rounded-lg overflow-hidden shadow-md hover:shadow-xl transition">
                <img src="{{asset('images/lisbon.jpg')}}" alt="Lisbonne" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Lisbonne, Portugal</h3>
                    <p class="text-gray-600 mb-4">Profitez du charme unique de la capitale portugaise</p>
                    <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Explorer les logements <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- How it works -->
    <section class="bg-blue-50 py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-10">Comment ça marche</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="text-center p-6">
                    <div class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-search text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Recherchez</h3>
                    <p class="text-gray-600">Trouvez l'hébergement idéal parmi notre vaste sélection de logements.</p>
                </div>
                
                <!-- Step 2 -->
                <div class="text-center p-6">
                    <div class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-check text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Réservez</h3>
                    <p class="text-gray-600">Réservez en toute simplicité et sécurité via notre plateforme.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="text-center p-6">
                    <div class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-home text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Profitez</h3>
                    <p class="text-gray-600">Vivez une expérience inoubliable pendant le Mondial 2030.</p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
