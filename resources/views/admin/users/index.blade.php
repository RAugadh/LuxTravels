@extends('admin.sidebar')

@section('admindash')

    <div class="px-5 py-3  overflow-hidden">
        @include('partials.alerts')

        <div class=" clearfix darkfont mb-3">
            <h3 class=" float-start">Registered Users </h3>
            <a class=" float-end btn btn-success" href="{{ route('admin.users.create') }}" role="button">Create</a>
        </div>
        <div class="bg-transparent darkfont shadow-sm p-2 mb-5 bg-white rounded">
            <table id="tableCrud" class="table table-borderless table-striped mt-3 p-2 text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Verification Date</th>
                        <th>Permission</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }} </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->email_verified_at }}</td>
                            <td>
                                @foreach ($roles as $role)
                                    @isset($user) @if (in_array($role->id, $user->roles->pluck('id')->toArray())) {{ $role->name }} @endif @endisset
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" role="button"
                                    class="btn btn-primary"><i class="bi bi-pen">{{ __(' Edit') }}</i>
                                </a>

                                <button type="button" class="btn btn-danger"
                                    onclick=" event.preventDefault(); document.getElementById('delete-user-form-{{ $user->id }}').submit()">
                                    <i class="bi bi-trash">{{ __(' Delete') }}</i></button>

                                <form id="delete-user-form-{{ $user->id }}"
                                    action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    style="display: none">
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>

            </table>
        </div>
    </div>
@endsection
