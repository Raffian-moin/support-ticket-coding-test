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
                        <h3 class="text-lg font-semibold">View Support Ticket</h3>
                        <a class="btn btn-primary" href="{{ route('admin.dashboard') }}" role="button">Ticket List</a>
                    </div>

                    <div class="form-group">
                        <label for="ticketId" class="form-label fw-bold">Ticket Opened By</label>:
                        {{ $supportTicket->user->name }}
                    </div>

                    <div class="form-group">
                        <label for="ticketId" class="form-label fw-bold">Status</label>:
                        {{ strtolower($supportTicket->status) }}
                    </div>

                    <div class="form-group">
                        <label for="ticketId" class="form-label fw-bold">Subject</label>:
                        {{ $supportTicket->subject }}
                    </div>

                    <div class="form-group">
                        <label for="ticketId" class="form-label fw-bold">Description</label>:
                        <div>{{ $supportTicket->description }}</div>
                    </div>

                    <div class="table-responsive">
                        <form action="{{ route('admin.update.support.ticket', $supportTicket->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="reply" class="form-label">Reply</label>
                                <textarea required class="form-control" id="reply" name="reply" rows="4" placeholder="Describe your reply"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Update Ticket Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
