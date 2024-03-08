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
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    @role('admin')
    @php
    $userCount = \App\Models\User::count();
    $activeUserCount = \App\Models\User::where('deleted_at')->count();
    $categoryCount = \App\Models\Category::count();
    $eventCount = \App\Models\Evenement::count();
    $reservationCount = \App\Models\Reservation::count();
    $reservationcout = \App\Models\Reservation::where('deleted_at')->count();
    $unvalidatedEventCount = \App\Models\Evenement::where('validation', false)->count();
    $validatedEventCount = \App\Models\Evenement::where('validation', true)->count();
    @endphp

   
<div class=" h-screen w-screen">
    <div class="grid gap-4 lg:gap-8 md:grid-cols-3 p-8 pt-20">
        <div class="relative p-6 rounded-2xl bg-white shadow ">
            <div class="space-y-2">
                <div
                    class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 ">
                    <span>Number of Users</span>
                </div>
                <div class="text-3xl">
                    {{ $userCount }}
                </div>
             
              
            </div>
        </div>
        <div class="relative p-6 rounded-2xl bg-white shadow ">
            <div class="space-y-2">
                <div
                    class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 ">
                    <span>Users qui sans suprimer</span>
                </div>
                <div class="text-3xl">
                    {{ $activeUserCount }}
                </div>
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M20 10H4v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8ZM9 13v-1h6v1c0 .6-.4 1-1 1h-4a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                    <path d="M2 6c0-1.1.9-2 2-2h16a2 2 0 1 1 0 4H4a2 2 0 0 1-2-2Z"/>
                  </svg>
                  
            </div>
        </div>
        <div class="relative p-6 rounded-2xl bg-white shadow ">
            <div class="space-y-2">
                <div
                    class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 ">
                    <span>Number category</span>
                </div>
                <div class="text-3xl">
                    {{ $categoryCount }}
                </div>
            </div>
        </div>
        <div class="relative p-6 rounded-2xl bg-white shadow ">
            <div class="space-y-2">
                <div
                    class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 ">
                    <span>event exist</span>
                </div>
                <div class="text-3xl">
                    {{ $eventCount }}
                </div>
            </div>
        </div>
        <div class="relative p-6 rounded-2xl bg-white shadow ">
            <div class="space-y-2">
                <div
                    class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 ">
                    <span>event invalid</span>
                </div>
                <div class="text-3xl">
                    {{ $unvalidatedEventCount }}
                    <svg class="w-10 h-10 text-gray-800 dark:text-black" style="display: inline; float:right" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm11-4a1 1 0 1 0-2 0v5a1 1 0 1 0 2 0V8Zm-1 7a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z" clip-rule="evenodd"/>
                      </svg>
                </div>
            </div>
        </div>
        <div class="relative p-6 rounded-2xl bg-white shadow ">
            <div class="space-y-2">
                <div
                    class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 ">
                    <span>event valider</span>
                </div>
                <div class="text-3xl">
                    {{ $validatedEventCount }}
                    <svg class="w-10 h-10 text-green-500 dark:text-black float-right" viewBox="0 0 20 20">
                        <path d="M10.219,1.688c-4.471,0-8.094,3.623-8.094,8.094s3.623,8.094,8.094,8.094s8.094-3.623,8.094-8.094S14.689,1.688,10.219,1.688 M10.219,17.022c-3.994,0-7.242-3.247-7.242-7.241c0-3.994,3.248-7.242,7.242-7.242c3.994,0,7.241,3.248,7.241,7.242C17.46,13.775,14.213,17.022,10.219,17.022 M15.099,7.03c-0.167-0.167-0.438-0.167-0.604,0.002L9.062,12.48l-2.269-2.277c-0.166-0.167-0.437-0.167-0.603,0c-0.166,0.166-0.168,0.437-0.002,0.603l2.573,2.578c0.079,0.08,0.188,0.125,0.3,0.125s0.222-0.045,0.303-0.125l5.736-5.751C15.268,7.466,15.265,7.196,15.099,7.03"></path>
                    </svg>
                </div>
                
            </div>
        </div>
        <div class="relative p-6 rounded-2xl bg-white shadow ">
            <div class="space-y-2">
                <div
                    class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 ">
                    <span>Reservation</span>
                </div>
                <div class="text-3xl">
                    {{ $reservationCount }}
                </div>
            </div>
        </div>
        <div class="relative p-6 rounded-2xl bg-white shadow ">
            <div class="space-y-2">
                <div
                    class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 ">
                    <span>cancled Reservation</span>
                </div>
                <div class="text-3xl">
                    {{ $reservationcout }}
                </div>
            </div>
        </div>
    </div>
</div>
    @endrole

</x-app-layout>