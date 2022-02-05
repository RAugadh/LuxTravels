<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ __('LuxTravels') }}</title>

    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dataTables.bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}" defer></script>
    <script src="{{ asset('assets/js/datatables.js') }}" defer></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.js') }}" defer></script>
    <script src="{{ asset('assets/js/script.js') }}" defer></script>



</head>

@yield('nav')
