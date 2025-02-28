<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Mes Hébergements</h2>
                        <a href="{{ route('listings.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md font-medium hover:bg-blue-700 transition flex items-center">
                            <i class="fas fa-plus mr-2"></i> Ajouter un hébergement
                        </a>
                    </div>
                    @if(Session::has('message'))
                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                    @endif
                    @if(count($listings) > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Hébergement</th>
                                        <th class="py-3 px-6 text-left">Type</th>
                                        <th class="py-3 px-6 text-center">Lieu</th>
                                        <th class="py-3 px-6 text-center">Prix/nuit</th>
                                        <th class="py-3 px-6 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm">
                                    @foreach($listings as $listing)
                                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                @if(count($listing->images) > 0)
                                                <div class="mr-3">
                                                    <img src="{{ asset('storage/'. $listing->images[0]->path) }}" alt="{{ $listing->name }}" class=" w-24 h-24 rounded object-cover">
                                                </div>
                                                @endif
                                                <span class="font-medium">{{ $listing->name }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span class="bg-blue-100 text-blue-800 py-1 px-3 rounded-full text-xs">{{ $listing->type }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            {{ $listing->city }}, {{ $listing->country }}
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span class="font-bold">{{ $listing->price }}€</span>
                                        </td>
                            
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">
                                                <a href="{{ route('listings.show', $listing->id) }}" class="w-8 h-8 rounded-full flex items-center justify-center text-blue-600 hover:bg-blue-100 mx-1">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('listings.edit', $listing->id) }}" class="w-8 h-8 rounded-full flex items-center justify-center text-yellow-600 hover:bg-yellow-100 mx-1">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button onclick="confirmDelete({{ $listing->id }})" class="w-8 h-8 rounded-full flex items-center justify-center text-red-600 hover:bg-red-100 mx-1">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $listings->links() }}
                        </div>
                    @else
                        <div class="bg-gray-50 rounded-lg p-8 text-center">
                            <div class="text-gray-500 mb-4">
                                <i class="fas fa-home text-5xl mb-4"></i>
                                <h3 class="text-xl font-medium mb-2">Vous n'avez pas encore d'hébergements</h3>
                                <p class="mb-6">Commencez à louer votre propriété et gagnez un revenu supplémentaire</p>
                                <a href="{{ route('listings.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-md font-medium hover:bg-blue-700 transition">
                                    Ajouter un hébergement
                                </a>
                            </div>
                        </div>
                    @endif
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
        function confirmDelete(id) {
            const modal = document.getElementById('deleteModal');
            const deleteForm = document.getElementById('deleteForm');
            const cancelDelete = document.getElementById('cancelDelete');
            
            // Set the form action
            deleteForm.action = `/listings/${id}`;
            
            // Show the modal
            modal.classList.remove('hidden');
            
            // Handle cancel button
            cancelDelete.onclick = function() {
                modal.classList.add('hidden');
            }
            
            // Close modal when clicking outside
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.classList.add('hidden');
                }
            }
        }
    </script>
</x-app-layout>