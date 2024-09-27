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
                                    <th scope="col" class="px-4 py-2">Actions</th>
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
                                            <a class="btn btn-sm btn-info" href="{{ route('admin.show.support.ticket', $ticket->id) }}" role="button">View</a>
                                            @if ($ticket->status !== "CLOSED")
                                                <a class="btn btn-sm btn-primary" href="{{ route('admin.edit.support.ticket', $ticket->id) }}" role="button">Update Status</a>
                                            @endif
                                            {{-- <button class="btn btn-sm btn-danger">Delete</button> --}}
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
