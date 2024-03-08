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
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($category as $CAT)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $CAT->id }}</td>
                            <td class="px-6 py-4">{{ $CAT->category_name }}</td>
                            <td class="px-6 py-4">
                               <a href="#" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                <ion-icon name="trash-outline"></ion-icon>                                   
                               </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-4">No category</td>
                        </tr>
                    @endforelse
                </tbody>
               
            </table>
            <br>
            {{ $category->links()}}
            <br>
        </div>
    </div>
</x-admin-layout>
