@extends('layouts.master')
@section('title')
    Listado de Pedidos
@endsection
@section('page-title')
    Listado de Pedidos
@endsection
 
@section('styles')
    <style>
    .badge-premium-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(16,24,40,0.12) !important;
        transition: all .18s ease;
    }

    @media (max-width: 576px) {
        .badge-premium-mobile {
            font-size: .75rem !important;
            padding: 5px 8px !important;
            border-radius: 10px !important;
        }
    }
</style>
@endsection
    @section('content')
        <livewire:admin.orders-manager/>
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
