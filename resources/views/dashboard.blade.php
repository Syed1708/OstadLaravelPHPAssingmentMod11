<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class=" font-mono font-extabold uppercase bg-green-600 text-white text-center p-6 mb-5 rounded-lg">Total Sales History</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Today's Sales Card -->
                        <div class="bg-white p-6 rounded shadow-md">
                            <h2 class="text-lg font-semibold mb-4">Today's Sales</h2>
                            <p class="text-3xl text-green-600">$ {{ number_format($totalToday, 2) }}</p>
                        </div>
                
                        <!-- Yesterday's Sales Card -->
                        <div class="bg-white p-6 rounded shadow-md">
                            <h2 class="text-lg font-semibold mb-4">Yesterday's Sales</h2>
                            <p class="text-3xl font-bold text-blue-600">$ {{ number_format($totalYesterday, 2) }}</p>
                        </div>
                
                        <div class="bg-white p-6 rounded shadow-md">
                            <h2 class="text-lg font-semibold mb-4">This Month's Sales</h2>
                            <p class="text-3xl font-bold text-purple-600">$ {{ number_format($totalThisMonth, 2) }}</p>
                        </div>
                
                        <div class="bg-white p-6 rounded shadow-md">
                            <h2 class="text-lg font-semibold mb-4">Last Month's Sales</h2>
                            <p class="text-3xl font-bold text-red-600">$ {{ number_format($totalLastMonth, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
