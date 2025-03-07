<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Mes réservations</h2>
                    </div>
                    @if(Session::has('message'))
                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                    @endif
                    @if(count($reservations) > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Hébergement</th>
                                        <th class="py-3 px-6 text-left">nom du tourist</th>
                                        <th class="py-3 px-6 text-center">nights</th>
                                        <th class="py-3 px-6 text-center">date d'arrivé</th>
                                        <th class="py-3 px-6 text-center">date de départ</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm">
                                    @foreach($reservations as $reservation)
                                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                                        <td class="py-3 px-6 text-left">
                                            {{$reservation->listing->name}}
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            {{$reservation->tourist->name}}
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            @php
                                                $startdate = Carbon\Carbon::parse($reservation->startdate);
                                                $enddate = Carbon\Carbon::parse($reservation->enddate);
                                            @endphp
                                            {{ $startdate->diffInDays($enddate)}}
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span class="font-bold">{{ $reservation->startdate }}</span>
                                        </td>
                            
                                        <td class="py-3 px-6 text-center">
                                            <span class="font-bold">{{$reservation->enddate}}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $reservations->links() }}
                        </div>
                    @else
                        <div class="bg-gray-50 rounded-lg p-8 text-center">
                            <div class="text-gray-500 mb-4">
                                <i class="fas fa-home text-5xl mb-4"></i>
                                <h3 class="text-xl font-medium mb-2">Vous n'avez pas encore des reservations</h3>
                                <p class="mb-6">Commencez à louer votre propriété et gagnez un revenu supplémentaire</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>