<!-- Footer -->
<footer class="bg-blue-800 text-white py-8 mt-12">
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
                    <li><a href="{{route('home')}}" class="hover:text-yellow-300">Accueil</a></li>
                    <li><a href="{{route('listings.index')}}" class="hover:text-yellow-300">Explorer</a></li>
                    
                </ul>
            </div>
        </div>
        
        <div class="border-t border-blue-700 mt-8 pt-8 text-center">
            <p>&copy; 2025 TouriStay 2030. Tous droits réservés.</p>
        </div>
    </div>
</footer>