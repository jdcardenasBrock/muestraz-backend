@extends('layouts.master')
@section('title')
    Listado de Usuarios
@endsection
@section('page-title')
    Listado de Usuarios
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        @php
            $encryptedId = request()->get('id');
        @endphp

        <livewire:admin.user-profile :id="$encryptedId" />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
