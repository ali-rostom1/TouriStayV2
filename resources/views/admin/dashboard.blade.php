<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Tableau de bord administrateur</h2>
                    </div>
                    
                    <!-- Statistiques principales -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <!-- Carte utilisateurs inscrits -->
                        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-gray-600 text-sm font-medium">Utilisateurs inscrits</h3>
                                <div class="p-2 bg-blue-100 rounded-full">
                                    <i class="fas fa-users text-blue-500"></i>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-3xl font-bold text-gray-800">{{$totalUsers}}</span>
                               
                            </div>
                        </div>
                        
                        <!-- Carte locations -->
                        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-gray-600 text-sm font-medium">Locations totales</h3>
                                <div class="p-2 bg-green-100 rounded-full">
                                    <i class="fas fa-key text-green-500"></i>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-3xl font-bold text-gray-800">{{$listings}}</span>
                                
                            </div>
                        </div>
                        
                        <!-- Carte annonces actives -->
                        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-gray-600 text-sm font-medium">Annonces actives</h3>
                                <div class="p-2 bg-yellow-100 rounded-full">
                                    <i class="fas fa-home text-yellow-500"></i>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-3xl font-bold text-gray-800">{{$activeListings}}</span>
                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>          
    </div>
</x-app-layout>