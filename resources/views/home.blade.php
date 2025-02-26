<x-app-layout>
    <!-- Hero Section -->
    <header class="bg-cover bg-center h-96" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://via.placeholder.com/1500x600');">
        <div class="container mx-auto h-full flex flex-col justify-center px-4">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Trouvez votre hébergement idéal pour le Mondial 2030</h1>
            <p class="text-xl text-white mb-8">Des milliers de logements au Maroc, en Espagne et au Portugal</p>
            
            <!-- Search Form -->
            <div class="bg-white p-4 rounded-lg shadow-md max-w-4xl">
                <form class="flex flex-col md:flex-row gap-4">
                    <div class="flex-grow">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="location">Destination</label>
                        <select id="location" class="w-full px-3 py-2 border rounded-md">
                            <option value="">Sélectionnez une ville</option>
                            <option value="casablanca">Casablanca</option>
                            <option value="rabat">Rabat</option>
                            <option value="marrakech">Marrakech</option>
                            <option value="madrid">Madrid</option>
                            <option value="barcelona">Barcelone</option>
                            <option value="lisbon">Lisbonne</option>
                            <option value="porto">Porto</option>
                        </select>
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
                <img src="https://via.placeholder.com/400x300" alt="Casablanca" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Casablanca, Maroc</h3>
                    <p class="text-gray-600 mb-4">Découvrez la plus grande ville du Maroc et ses nombreuses attractions</p>
                    <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Explorer les logements <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>
            
            <!-- Destination Card 2 -->
            <div class="rounded-lg overflow-hidden shadow-md hover:shadow-xl transition">
                <img src="https://via.placeholder.com/400x300" alt="Madrid" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Madrid, Espagne</h3>
                    <p class="text-gray-600 mb-4">Vivez l'ambiance festive de la capitale espagnole pendant le Mondial</p>
                    <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Explorer les logements <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>
            
            <!-- Destination Card 3 -->
            <div class="rounded-lg overflow-hidden shadow-md hover:shadow-xl transition">
                <img src="https://via.placeholder.com/400x300" alt="Lisbonne" class="w-full h-48 object-cover">
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

    <!-- Footer -->
    <footer class="bg-blue-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">TouriStay 2030</h3>
                    <p class="mb-4">La meilleure plateforme pour trouver un hébergement pendant le Mondial 2030.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-yellow-300"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="hover:text-yellow-300"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="hover:text-yellow-300"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Liens rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-300">Accueil</a></li>
                        <li><a href="#" class="hover:text-yellow-300">Explorer</a></li>
                        <li><a href="#" class="hover:text-yellow-300">À propos</a></li>
                        <li><a href="#" class="hover:text-yellow-300">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Hébergeurs</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-300">Devenir hôte</a></li>
                        <li><a href="#" class="hover:text-yellow-300">Ressources</a></li>
                        <li><a href="#" class="hover:text-yellow-300">Centre d'aide</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-300">Centre d'aide</a></li>
                        <li><a href="#" class="hover:text-yellow-300">Conditions d'utilisation</a></li>
                        <li><a href="#" class="hover:text-yellow-300">Politique de confidentialité</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-blue-700 mt-8 pt-8 text-center">
                <p>&copy; 2025 TouriStay 2030. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</x-app-layout>
