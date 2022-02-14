@extends('admin.sidebar')

@section('admindash')
    <div class="container">
        <div class="nav text-dark border p-3">
            <h3 class="float-start me-5">{{ 'Subject :' . ' ' . $instance->subject }}</h3>
            <div class="d-flex  ms-5">
                <div class="float-end">
                    <form action="{{ url('admin/query/close', $instance->id) }}" method="POST">
                        <a href="" class="btn btn-success ms-5"> Refresh</a>
                        <a href="{{ url('admin/queries') }}" class="btn btn-dark ms-4"> Return to Queries</a>

                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="1">
                        <button type="submit" class="btn btn-danger ms-5">Close Current Query</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="position-relative text-dark mx-5">
            <div class="chat-messages p-4">
                @foreach ($messages as $message)
                    @if ($message->user_id == Auth::user()->id)
                        <div class="chat-message-right pb-2 border bg-content-l mb-3">
                            <div class="p-2">
                                <img src="@if (Auth::user()->photo !== null) {{ asset('uploads/profile') }}/{{ Auth::user()->photo }} @else{{ asset('assets/images/profile.jpg') }} @endif" class="rounded-circle mr-1"
                                    alt="{{ Auth::user()->name }}" width="40" height="45">
                                <div class=" small text-nowrap mt-2">
                                    {{ Carbon\Carbon::parse($message->sent_at)->format('g:ia') }}</div>
                            </div>
                            <div class="flex-shrink-1 rounded py-2 px-3 mr-3">
                                <div class="font-weight-bold mb-1 fw-bold">You</div>
                                {{ $message->message }}
                            </div>
                        </div>
                    @else
                        @foreach ($users as $user)
                            @if ($user->id == $message->user_id)
                                @if ($user->id != Auth::user()->id)
                                    <div class="chat-message-left pb-2 border bg-primary">
                                        <div class="p-2">
                                            <img src="@if ($user->photo !== null) {{ asset('uploads/profile') }}/{{ $user->photo }} @else{{ asset('assets/images/profile.jpg') }} @endif" class="rounded-circle mr-1"
                                                alt="{{ $user->name }}" width="40" height="45">
                                            <div class=" small text-nowrap text-white mt-2">
                                                {{ Carbon\Carbon::parse($message->sent_at)->format('g:ia') }}</div>
                                        </div>
                                        <div class="flex-shrink-1 rounded py-2 px-3 ml-3">
                                            <div class="font-weight-bold mb-1 fw-bold">{{ $user->name }}</div>
                                            {{ $message->message }}
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
        <div class="position-absolute bottom-0 w-75 ms-5   mb-4">
            <form class="position-sticky" action="{{ url('admin/sendMsg', $instance->id) }}" method="POST">
                @csrf
                <div class="row ">
                    <div class="col-9">
                        <input type="text" class="form-control form-control-lg" placeholder="Message" name="message"
                            required>
                        <input type="hidden" name="chat_instance_id" value="{{ $instance->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    </div>
                    <button type="submit" class="btn btn-primary col-3">Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection
<script>
    document.body.classList.add("overflow-hidden");
</script>
