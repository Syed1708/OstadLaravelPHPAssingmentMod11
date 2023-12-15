<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    
                        <h1 class=" text-xl font-bold mb-4 text-left">
                           <a class=" text-indigo-50 bg-gray-600 p-2 rounded-lg shadow-lg" href="{{ route('products.create') }}">Add New Product</a> </h1>

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
                                    <th class="py-2 px-4 border-b text-left">Product Name</th>
                                    <th class="py-2 px-4 border-b text-left">Price</th>
                                    <th class="py-2 px-4 border-b text-left">Quantity</th>
                                    <th class="py-2 px-4 border-b text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $product->price }}</td>
                                        <td class="py-2 px-4 border-b">{{ $product->quantity }}</td>
                                        <td class="py-2 px-4 border-b w-min text-right">
                                            <a class=" text-white bg-green-600 p-2 rounded-md shadow-md" href="{{ route('products.show', $product->id)}}">View</a>
                                            <a class=" text-white bg-green-600 p-2 rounded-md shadow-md" href="{{ route('products.edit', $product->id)}}">Edit</a>
                                            <form action="{{ route('products.destroy', $product->id)}}" method="POST">
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
                        {{ $products->Links() }}
                    </div>

                    

                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>

{{-- 
<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Product Infp') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('more info abount the product') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'showProduct')"
    >{{ __('Show ') }}</x-danger-button>

    <x-modal name="showProduct" focusable>
   

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
            </div>

    </x-modal>
</section> --}}

