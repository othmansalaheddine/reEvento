<x-admin-layout>
    <div class="text-center">
        <h1 class="text-xl">users</h1>
    </div>
    <div class="mx-auto max-w-screen-lg mt-5">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">E-mail</th>
                        <th scope="col" class="px-6 py-3">Providers</th>
                        <th scope="col" class="px-6 py-3">Verification E-mail</th>
                        <th scope="col" class="px-6 py-3">Data De Creation</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($AllUsers as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $user->id }}</td>
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                @isset($user->providers)
                                    {{ $user->providers }}
                                @else
                                    <span class="text-red-500">No providers available</span>
                                @endisset
                            </td>
                            <td class="px-6 py-4">{{ $user->email_verified_at }}</td>
                            <td class="px-6 py-4">{{ $user->created_at }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Deletiha')" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4">No users</td>
                        </tr>
                    @endforelse
                </tbody>
                {{ $AllUsers->links()}}
            </table>

        </div>

    </div>
</x-admin-layout>
