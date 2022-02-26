@extends('admin.sidebar')

@section('admindash')
    <div class="container p-2 mb-5 text-dark">
        <div class="clearfix">
            <h4 class="mt-4 float-start">User Queries</h4>
            <a href="{{ url('/admin/new-query') }}" class="btn btn-primary mt-4 me-5 float-end">Accept New Query</a>
        </div>

        <div class=" mt-5 ">
            <table id="chatCrud" class="table table-borderless text-dark table-striped mt-3 py-2" style="width:100%">
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
                        @if ($chat->assigned_to == Auth::user()->name)
                            <tr class="text-dark">
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
                                    {{ $chat->assigned_to }}
                                </td>
                                <td class="d-flex">
                                    @if ($chat->status == 0)
                                        <div class="mx-auto d-flex">
                                            <a href="{{ url('admin/openQuery', $chat->id) }}"
                                                class="btn btn-primary mx-2">View</a>
                                            <form action="{{ url('admin/query/close', $chat->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="1">
                                                <button type="submit" class="btn btn-danger mx-2">Close Query</button>
                                            </form>
                                        </div>

                                    @else
                                        <form action="{{ url('admin/query/close', $chat->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="0">
                                            <button type="submit" class="btn btn-warning mx-2">Reopen Query</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
        </div>
    </div>
    <script>
        function form_submit() {
            document.getElementById("instance_form").submit();
        }
    </script>
@endsection
