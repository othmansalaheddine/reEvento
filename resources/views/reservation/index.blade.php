<x-User-layout>
  <div class="container mt-8">
      <div class="row">
          @forelse($reservations as $reservation)
              <div class="col-md-4 mb-4">
                  <div class="bg-white p-6 rounded-lg shadow-md relative">
                      @if($reservations->isNotEmpty())
                          <form method="post" action="{{ route('reservation.destroy', ['reservation' => $reservation->id]) }}" class="absolute top-0 right-0 m-4">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="text-white bg-red-500 hover:bg-red-700 px-4 py-2 rounded">
                                  Cancel Reservation
                              </button>
                          </form>
                      @endif

                      @role('admin')
                          <form method="post" action="{{ route('updateStatus', ['id' => $reservation->id]) }}" class="absolute top-0 right-0 m-4 mt-14">
                              @csrf
                              @method('put')
                              <button type="submit" class="text-white bg-green-500 hover:bg-green-700 px-4 py-2 rounded">
                                  Valider Reservation
                              </button>
                          </form>
                      @endrole

                      <h2 class="text-2xl font-semibold mb-4">M / Mmd: {{ optional($reservation->user)->name }}</h2>

                      <div class="flex items-center justify-between mb-4">
                          <p class="text-gray-600">Event Title: {{ $reservation->event->titre }}</p>
                          <p class="text-gray-600 text-xl font-bold">Ticket Number: {{ $reservation->ticket_number }}</p>
                      </div>

                      <p class="text-gray-600">Status: {{ $reservation->status }}</p>

                      <div class="my-4">
                          <img width="50%" src="{{ asset('storage/' . $reservation->event->image) }}" alt="Event Image">
                      </div>
                  </div>
              </div>
          @empty
              <div role="alert" class="relative flex w-full px-4 py-4 text-base text-white bg-gray-900 rounded-lg font-regular">
                  <div class="shrink-0">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                          stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round"
                              d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z">
                          </path>
                      </svg>
                  </div>
                  <div class="ml-3 mr-12">mkaynach reservation</div>
              </div>
          @endforelse
      </div>
  </div>
</x-User-layout>
