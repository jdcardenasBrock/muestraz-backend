@extends('layouts.master')
@section('title')
    Administrador de Banners
@endsection
@section('page-title')
    Administrador de Banners
@endsection
    @section('content')
        <livewire:admin.carousel-manager />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
