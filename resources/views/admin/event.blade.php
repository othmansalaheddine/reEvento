<x-admin-layout>
    <div class="text-center">
        <h1 class="text-xl">Categories</h1>
    </div>
    <div class="mx-auto max-w-screen-lg mt-5">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">titre</th>
                        <th scope="col" class="px-6 py-3">description</th>
                        <th scope="col" class="px-6 py-3">lieu</th>
                        <th scope="col" class="px-6 py-3">date</th>
                        <th scope="col" class="px-6 py-3">image</th>
                        <th scope="col" class="px-6 py-3">places number</th>
                        <th scope="col" class="px-6 py-3">organisateur</th>
                        <th scope="col" class="px-6 py-3">category</th>
                        <th scope="col" class="px-6 py-3">status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($Event as $even)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $even->id }}</td>
                            <td class="px-6 py-4">{{ $even->titre }}</td>
                            <td class="px-6 py-4">{{ Str::limit($even->description , 20)}}</td>
                            <td class="px-6 py-4">{{ $even->lieu }}</td>
                            <td class="px-6 py-4">{{ $even->date }}</td>
                            <td class="px-6 py-4">
                                <img class="w-60 h-16 mx-auto mb-4 rounded-full" src="{{ asset('storage/'. $even->image) }}" alt="Event Picture">
                            </td>
                            <td class="px-6 py-4">{{ $even->places_number }}</td>
                            <td class="px-6 py-4">{{ $even->organisateur->name }}</td>
                            <td class="px-6 py-4">{{ $even->category->category_name }}</td>
                            <td class="px-6 py-4">
                                <form method="POST" action="{{ route('updateValidation', ['id' => $even->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                     class="text-white 
                                     bg-{{ $even->validation === 'valid' ? 'green-700' : 'red-700' }} 
                                     hover:bg-{{ $even->validation === 'valid' ? 'green-800' : 'red-800' }} 
                                     focus:ring-4 focus:ring-{{ $even->validation === 'valid' ? 'green-300' : 'red-300' }}
                                      font-medium rounded-lg text-sm px-5 py-2.5 
                                      dark:bg-{{ $even->validation === 'valid' ? 'green-600' : 'red-600' }} 
                                      dark:hover:bg-{{ $even->validation === 'valid' ? 'green-700' : 'red-700' }} 
                                      focus:outline-none dark:focus:ring-{{ $even->validation === 'valid' ? 'green-800' : 'red-800' }}">
                                        {{ $even->validation }}
                                    </button>
                                </form>
                            </td>
                            
                            
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-4">No Event Exist</td>
                        </tr>
                    @endforelse 
                </tbody>
               
            </table>
            <br>
            {{ $Event->links()}}
            <br>
        </div>
    </div>
</x-admin-layout>
{{-- 
<td>{{ $event->titre }}</td>
        <td>{{ $event->description }}</td>
        <td>{{ $event->lieu }}</td>
        <td>{{ $event->date }}</td>
        <td>{{ $event->image }}</td>
        <td>{{ $event->places_number }}</td>
        <td></td>
        <td>{{ $event->organisateur->name }}</td>
        <td>{{ $event-> }}</td>
        <td>{{ $event->status }}</td> --}}