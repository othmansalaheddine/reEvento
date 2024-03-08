<x-User-layout>

    <form  action="{{ url('/search') }}" class="max-w-md mx-auto mt-5 mb-5">   
        <label for="default-search" class="mb-2 text-sm font-medium  sr-only ">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="default-search" name="query" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>

    @if ($Evenet->isEmpty())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">No results found!</strong>
            <span class="block sm:inline">Please refine your search criteria.</span>
        </div>
    @else
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @foreach ($Evenet as $event)
                    @if($event->status == 'available' && $event->validation == 'valid')
                        <div class="max-w-md w-full bg-white p-8 rounded shadow-md">
                            <img class="w-16 h-16 mx-auto mb-4 rounded-full" src="{{ asset('storage/' . $event->image) }}" alt="Event Picture">
                            <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $event->titre }}</h2>
                            <p class="text-gray-600">{{ $event->created_at }}</p>
                            <hr class="my-4">
                            <p class="text-gray-700">{{ Str::limit($event->description, 20) }}</p>
                            <div class="mt-4">
                                <div class="mt-4">
                                    <a href="{{ route('User.show', $event->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">More</a>
                                </div>
                                <br>
                                <p class="text-gray-600">{{ $event->reservations->count(). "/" . $event->places_number }}</p>
                                <form action="{{ route('reservation.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id_event" value="{{ $event->id }}">
                                    <button type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Réserver cet événement</button>
                                </form>
                                @role('Organisateur')
                                <form action="{{ route('User.destroy', ['User' => $event->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="focus:outline-none text-white bg-red-400 hover:bg-red-500 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-red-900">Cancel User</button>
                                </form>
                                @endrole
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
</x-User-layout>
