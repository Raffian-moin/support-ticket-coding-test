<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Support Tickets</h3>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="px-4 py-2">SL</th>
                                    <th scope="col" class="px-4 py-2">Title</th>
                                    <th scope="col" class="px-4 py-2">Description</th>
                                    <th scope="col" class="px-4 py-2">Status</th>
                                    <th scope="col" class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2">1</td>
                                    <td class="px-4 py-2">ABC</td>
                                    <td class="px-4 py-2">Description</td>
                                    <td class="px-4 py-2">Closed</td>
                                    <td class="px-4 py-2">
                                        <button class="btn btn-sm btn-primary">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
