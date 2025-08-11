@extends('layouts.master')
@section('title')
    Administrador de Categorias
@endsection
@section('page-title')
    Administrador de Categorias
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <livewire:admin.category-manager />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection