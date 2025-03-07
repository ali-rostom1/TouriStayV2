<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Les transactions</h2>
                    </div>
                    @if(Session::has('message'))
                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                    @endif
                    @if(count($transactions) > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Payment id</th>
                                        <th class="py-3 px-6 text-center">nom du payant</th>
                                        <th class="py-3 px-6 text-left">Statut</th>
                                        <th class="py-3 px-6 text-left">prix</th>
                                        <th class="py-3 px-6 text-center">currency</th>
                                        <th class="py-3 px-6 text-center">date</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm">
                                    @foreach($transactions as $transaction)
                                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                                        <td class="py-3 px-6 text-left">
                                            {{$transaction->payment_id}}
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                           
                                            {{$transaction->reservation->tourist->name}}
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            {{$transaction->status}}
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            {{$transaction->amount}}
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            {{ $transaction->currency}}
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span class="font-bold">{{ $transaction->created_at }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $transactions->links() }}
                        </div>
                    @else
                        <div class="bg-gray-50 rounded-lg p-8 text-center">
                            <div class="text-gray-500 mb-4">
                                <i class="fas fa-home text-5xl mb-4"></i>
                                <h3 class="text-xl font-medium mb-2">Il n'y a pas des transactions</h3>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>