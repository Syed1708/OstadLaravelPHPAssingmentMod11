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
                    
                <h1 class=" text-2xl font-bold mb-4 text-center">Add New Product</h1>

                <form method="POST" action="{{ route('products.store') }}">
                    @csrf
            
                    <!--Product Name -->
                    <div>
                        <x-input-label for="name" :value="__(' Product Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!--Product quantity -->
                    <div>
                        <x-input-label for="quantity" :value="__(' Product quantity')" />
                        <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" :value="old('quantity')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                    </div>
                    <!--Product price -->
                    <div>
                        <x-input-label for="price" :value="__(' Product Price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>
                    
                    <!--Product Description -->
                    <div>
                        <x-input-label for="desc" :value="__(' Product Description')" />
                        <x-text-input id="desc" class="block mt-1 w-full" type="text" name="desc" :value="old('desc')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('desc')" class="mt-2" />
                    </div>
            

            
            
            
                    <div class="flex items-center justify-center mt-4">
                        <x-secondary-button>
                           <a href="{{ route('products.index')}}"> {{ __('Cancel') }} </a> 
                        </x-secondary-button>

                        <x-primary-button class="ml-4">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>
               

                    

                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
