@extends('user.sidebar')

@section('userdash')
    <div class="container p-2 mb-5 ">
        <div class="clearfix">
            <h4 class="mt-4 float-start">Get in Contact with an Admin to resolve any Issues</h4>
            <button class="btn btn-primary mt-4 me-5 float-end" data-bs-toggle="modal" data-bs-target="#newQuery">Raise new
                Query</button>
        </div>
        @include('partials.alerts')
        <div class="modal fade" id="newQuery" tabindex="-1" aria-labelledby="newQueryLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content darkfont">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newQueryLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user.chat.store') }}" method="POST" id="instance_form">
                            @csrf
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Subject:</label>
                                <input type="text" class="form-control" id="recipient-name" name="subject" required>
                                <input type="hidden" class="form-control" id="recipient-name" name="user_id" required
                                    value="{{ Auth::user()->id }}">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text" name="message" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="form_submit()" type="submit" class="btn btn-primary">Send
                            message</button>
                    </div>

                </div>
            </div>
        </div>
        <div class=" mt-5 ">
            <table id="chatCrud" class="table table-borderless text-white table-striped mt-3 py-2" style="width:100%">
                <thead>
                    <tr>
                        <th>Chat ID</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Handler</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chats as $chat)
                        <tr class="text-white">
                            <td>{{ $chat->id }}</td>
                            <td>{{ $chat->subject }}</td>
                            <td>
                                @if ($chat->status == 0)
                                    <h5 class="text-warning">Active</h5>
                                @else
                                    <h5 class="text-success">Closed</h5>
                                @endif
                            </td>
                            <td>
                                @if ($chat->assigned_to == null)
                                    <h5 class="text-warning">Waiting for Admin</h5>
                                @else
                                    {{ $chat->assigned_to }}
                                @endif
                            </td>
                            <td>
                                @if ($chat->status == 0)
                                    @if ($chat->assigned_to == null)
                                        <button class="btn btn-secondary mx-auto" disabled>View</button>
                                    @else
                                        <a href="{{ route('user.chat.show', $chat->id) }}"
                                            class="btn btn-primary mx-auto">View</a>
                                    @endif
                                @else
                                    <h5 class="text-success">Closed</h5>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
    </div>
    <script>
        document.body.classList.remove("bg-light");
        document.body.classList.add("bg-content");

        function form_submit() {
            document.getElementById("instance_form").submit();
        }
    </script>
@endsection
