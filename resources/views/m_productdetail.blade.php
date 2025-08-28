@extends('layouts.master')
@section('title')
    Editar Productos
@endsection
@section('page-title')
    Editar Productos
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <livewire:admin.productdetail-manager :product="$product"/>
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
