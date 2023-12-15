<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                <h1 class=" text-2xl font-bold mb-4 text-center">Edit Sale</h1>

                <form method="POST" action="{{ route('sales.update', $sale->id) }}">
                    @csrf
                    @method('put')
            
                    <div class="mb-4">
                        <label for="product_id">Product:</label>
                        <select name="product_id" id="product_id" class="border rounded px-4 py-2" x-model="selectedProduct" >
                            
                            <option value="">Select a product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" @if(optional($sale)->product_id == $product->id) selected @endif>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                        <p class=" text-red-500">
                            @error('product_id')
                                {{$message}}
                            @enderror
                        </p>
                    </div>
                    <div>
                        <x-input-label for="sale_date" :value="__(' Sale Date')" />
                        <x-text-input id="sale_date" class="block mt-1 w-full" 
                        type="date" name="sale_date" :value="$sale->sale_date"
                        required autofocus autocomplete="sale_date" />
                        <x-input-error :messages="$errors->get('sale_date')" class="mt-2" />
                    </div>
                    
                    <!--sale quantity_sold -->
                    <div>
                        <x-input-label for="quantity_sold" :value="__(' Sale Quantity')" />
                        <x-text-input id="quantity_sold" class="block mt-1 w-full" type="number" name="quantity_sold" :value="$sale->quantity_sold" required autofocus autocomplete="quantity_sold" />
                        <x-input-error :messages="$errors->get('quantity_sold')" class="mt-2" />
                    </div>
                    <!--sale sale_price -->
                    <div>
                        <x-input-label for="sale_price" :value="__(' Sale Price')" />
                        <x-text-input id="sale_price" class="block mt-1 w-full" type="number" name="sale_price" :value="$sale->sale_price" required autofocus autocomplete="sale_price" />
                        <x-input-error :messages="$errors->get('sale_price')" class="mt-2" />
                    </div>

            

            
            
            
                    <div class="flex items-center justify-center mt-4">
                        <x-secondary-button>
                           <a href="{{ route('sales.index')}}"> {{ __('Cancel') }} </a> 
                        </x-secondary-button>

                        <x-primary-button class="ml-4">
                            {{ __('Update') }}
                        </x-primary-button>
                    </div>
                </form>
               

                    

                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
