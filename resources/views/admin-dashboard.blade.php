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
                                    <th scope="col" class="px-4 py-2">Ticket Opened by</th>
                                    <th scope="col" class="px-4 py-2">Status</th>
                                    <th scope="col" class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supportTickets as $key => $ticket)
                                    <tr>
                                        <td class="px-4 py-2">{{ $key + 1 }}</td>
                                        <td class="px-4 py-2">{{ $ticket->subject }}</td>
                                        <td class="px-4 py-2">{{ $ticket->description }}</td>
                                        <td class="px-4 py-2">{{ strtolower($ticket->user->name) }}</td>
                                        <td class="px-4 py-2">{{ strtolower($ticket->status) }}</td>
                                        <td class="px-4 py-2">
                                            <button class="btn btn-sm btn-primary">View</button>
                                            <button class="btn btn-sm btn-danger">Edit</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
