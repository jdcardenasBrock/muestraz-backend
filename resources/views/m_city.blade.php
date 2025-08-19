@extends('layouts.master')
@section('title')
    Administrador de Ciudades
@endsection
@section('page-title')
    Administrador de Ciudades
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <livewire:admin.city-manager />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
