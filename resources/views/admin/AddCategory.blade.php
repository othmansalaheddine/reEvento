<x-admin-layout>
   
    <div class="container mx-auto p-8 bg-white rounded shadow mt-6 ">

        <h1 class="text-2xl font-bold mb-6">Create Category</h1>

        <form action="{{ route('admin.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="titre" class="block text-gray-600 text-sm font-semibold mb-2">Name Category</label>
                <input type="text" name="category_name" id="titre"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" >
            </div>
            <div class="mb-6">
                <button class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    New Category
                </button>
            </div>

        </form>
    </div>

</x-admin-layout>