@extends('layouts.layoutWeb')
@section('title')
    Carrito de Compras
@endsection
@section('page-title')
    Carrito de Compras
@endsection

    @section('content')
        <livewire:client.cart_page />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
