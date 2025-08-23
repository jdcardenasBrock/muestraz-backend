@extends('layouts.master')
@section('title')
    Listado de Productos
@endsection
@section('page-title')
    Listado de Productos
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <livewire:admin.product-manager/>
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
