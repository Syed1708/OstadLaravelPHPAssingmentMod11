<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sales') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    
                        <h1 class=" text-xl font-bold mb-4 text-left">
                           <a class=" text-indigo-50 bg-gray-600 p-2 rounded-lg shadow-lg" href="{{ route('sales.create') }}">Add New Sale</a> </h1>

                           <p class=" text-right">
                            @if(session('success'))

                            <div class=" text-green-400 p-4 mb-4 text-right font-mono font-semibold">
                                {{ session('success')}}
                            </div>
                                
                            @endif
                           </p>
                        <table class="w-full bg-white border border-gray-300">
                            <thead class=" bg-gray-500 font-bold text-white">
                                <tr>
                                    <th class="py-2 px-4 border-b text-left">Sale ID</th>
                                    <th class="py-2 px-4 border-b text-left">Product Name</th>
                                    <th class="py-2 px-4 border-b text-left">Sale Price</th>
                                    <th class="py-2 px-4 border-b text-left">Quantity Sold</th>
                                    <th class="py-2 px-4 border-b text-left">Total</th>
                                    <th class="py-2 px-4 border-b text-left">Sale Date</th>
                                    <th class="py-2 px-4 border-b text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $sale)
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{ $sale->id }}</td>
                                        <td class="py-2 px-4 border-b">{{ $sale->product->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $sale->sale_price }}</td>
                                        <td class="py-2 px-4 border-b">{{ $sale->quantity_sold }}</td>
                                        <td class="py-2 px-4 border-b">{{ $sale->total_sales_amount }}</td>
                                        <td class="py-2 px-4 border-b">{{ $sale->sale_date  }}</td>
                                        <td class="py-2 px-4 border-b w-min text-right">
                                            <a class=" text-white bg-green-600 p-2 rounded-md shadow-md" href="{{ route('sales.show', $sale->id)}}">View</a>
                                            <a class=" text-white bg-green-600 p-2 rounded-md shadow-md" href="{{ route('sales.edit', $sale->id)}}">Edit</a>
                                            <form action="{{ route('sales.destroy', $sale->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                            
                                                <button onclick="return confirm('Are you sure to delete ??')" class=" mt-2 text-white bg-red-500 p-2 rounded-md shadow-md">Delete</button>
                                                
                                           
                                            </form>
                                           
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <div class=" p-4">
                        {{ $sales->Links() }}
                    </div>

                    

                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
