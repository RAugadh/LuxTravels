@extends('admin.sidebar')

@section('title')
    {{ __('Dashboard') }}
@endsection

@section('admindash')

    <div class="p-5">
        <div class=" darkfont mb-3">
            <h3>Registered Users </h3>
        </div>
        <div class=" bg-light p-1">
            <table id="tableCrud" class="table table-borderless table-striped mt-3 text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Register Date</th>
                        <th>Admin</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td><button type="button" class="btn btn-info"><i class="bi bi-pen">Edit</i></button></td>
                        <td><button type="button" class="btn btn-danger"><i class="bi bi-trash">Delete</i></button></td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
@endsection
