@extends('layouts.master')
@section('title')
    Administrador de Carouseles
@endsection
@section('page-title')
    Administrador de Carouseles
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <livewire:admin.carousel-manager />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
