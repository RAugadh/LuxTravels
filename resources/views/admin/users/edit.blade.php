@extends('admin.sidebar')

@section('admindash')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card login-frm-bg mb-3 mt-3">
                <div class="card-header fw-bold mb-2 text-center text-uppercase">Edit User</div>
                <div class="card-body">

                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @method('PATCH')
                        @include('admin.users.partials.form', ['edit' => true])
                    </form>

                </div>
            </div>


        </div>
    </div>

@endsection
