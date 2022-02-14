@extends('admin.sidebar')

@section('admindash')
    <div class="container p-2 mb-5 ">
        <div class="clearfix">
            <h4 class="mt-4 float-start">Accept a New Query</h4>
            <a href="{{ url('admin/queries') }}" class="btn btn-primary mt-4 me-5 float-end">Active Queries</a>
        </div>

        <div class=" mt-5 ">
            <table id="chatCrud" class="table table-borderless text-white table-striped mt-3 py-2" style="width:100%">
                <thead>
                    <tr>
                        <th>Chat ID</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>User ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chats as $chat)
                        @if ($chat->assigned_to == null)
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
                                    {{ $chat->user_id }}
                                </td>
                                <td>
                                    <form action="{{ url('admin/query/accept', $chat->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="assigned_to" value="{{ Auth::user()->name }}">
                                        <button type="submit" class="btn btn-primary mx-auto">Accept Query</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
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
