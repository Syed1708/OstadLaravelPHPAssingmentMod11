<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Single sale') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    
                        <h1 class=" text-xl font-bold mb-4 text-left">
                           <a class=" text-indigo-50 bg-gray-600 p-2 rounded-lg shadow-lg" href="{{ route('sales.index') }}">Back</a> </h1>

                        <table class="w-full bg-white border border-gray-300">
                            <thead class=" bg-gray-500 font-bold text-white">
                                <tr>
                                    <th class="py-2 px-4 border-b text-left">Sale ID</th>
                                    <th class="py-2 px-4 border-b text-left">Product Name</th>
                                    <th class="py-2 px-4 border-b text-left">Sale Price</th>
                                    <th class="py-2 px-4 border-b text-left"> Sale Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{ $sale->id }}</td>
                                        <td class="py-2 px-4 border-b">{{ $sale->product->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $sale->sale_price }}</td>
                                        <td class="py-2 px-4 border-b">{{ $sale->quantity_sold }}</td>
                                    </tr>
                                
                            </tbody>
                        </table>


                    

                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>

