<x-User-layout>
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2"></h2>
            <div class="max-w-md w-full bg-white p-8 rounded shadow-md">
                <img class="w-16 h-16 mx-auto mb-4 rounded-full" src="{{ asset('storage/' . $evenement->image) }}" 
                alt="Event Picture">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $evenement->titre }}</h2>
                <p class="text-gray-600">{{ $evenement->created_at }}</p>
                <hr class="my-4">
                <p class="text-gray-700">{{ $evenement->description}}</p>
                <div class="mt-4">
                    <p class="text-gray-700">{{ $evenement->category->category_name}}</p>
                </div>
            </div>
        </div>
    </div>
</x-User-layout>
