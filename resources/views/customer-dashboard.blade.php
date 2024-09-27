<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Support Tickets</h3>
                        <a class="btn btn-primary" href="{{ route('customer.add.support.ticket') }}" role="button">Add Ticket</a>
                    </div>
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
                                @foreach ($supportTickets as $key => $ticket)
                                    <tr>
                                        <td class="px-4 py-2">{{ $key + 1 }}</td>
                                        <td class="px-4 py-2">{{ $ticket->subject }}</td>
                                        <td class="px-4 py-2">{{ $ticket->description }}</td>
                                        <td class="px-4 py-2">{{ strtolower($ticket->status) }}</td>
                                        <td class="px-4 py-2">
                                            <a class="btn btn-sm btn-info" href="{{ route('customer.show.support.ticket', $ticket->id) }}" role="button">View</a>
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
