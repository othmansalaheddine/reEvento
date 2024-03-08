<x-organisateur-layout>
    <div class="container mx-auto p-8 bg-white rounded shadow mt-6 ">

        <h1 class="text-2xl text-center font-bold mb-6">Edit Event</h1>
        <form action="{{ route('Event.update', ['Event' => $Event->id]) }}" method="post" enctype="multipart/form-data" class="max-w-md mx-auto">            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Titre:</label>
                <input type="text" name="titre" value="{{ $Event->titre }}" id="titre" class="form-input w-full" >
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea name="description"  id="description" class="form-textarea w-full" >{{ $Event->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="lieu" class="block text-gray-700 text-sm font-bold mb-2">Lieu:</label>
                <input type="text" name="lieu" value="{{ $Event->lieu}}" id="lieu" class="form-input w-full" >
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                <input type="date" name="date" value="{{ $Event->date }}" id="date" class="form-input w-full" >
            </div>

            <div class="mb-4">
                <label for="places_number" class="block text-gray-700 text-sm font-bold mb-2">Places Number:</label>
                <input type="text" name="places_number" value="{{ $Event->places_number}}" id="places_number" class="form-input w-full" >
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image Envent</label>
                <input type="file" name="image" value="{{ old('image') }}" id="image" class="form-input w-full" >
            </div>
            
            <div class="mb-4">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                <select name="category" id="category"  value="{{ $Event->category }}" class="form-select text-black w-full" >
                    @forelse($Categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name}}</option>
                    @empty
                        <option value="" disabled>No categories available</option>
                    @endforelse
                </select>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-black text-sm font-bold mb-2">Status:</label>
                <select name="status"  value="{{ $Event->status}}" id="status" class="form-select w-full" >
                    <option value="available">Available</option>
                    <option value="notAvailable">Not Available</option>
                </select>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Modifier</button>
            </div>
        </form>
    </div>
</x-organisateur-layout>